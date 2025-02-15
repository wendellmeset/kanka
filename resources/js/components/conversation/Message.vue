<template>
    <div v-bind:class="boxClasses(message)">
        <div class="flex items-center gap-1" v-if="!message.group">
            <div class="message-author">
                <strong class="user" v-if="isUser">{{ message.user }}</strong>
                <strong class="character" v-else-if="isCharacter">
                    <span>{{ message.character }}</span>
                </strong>
                <strong class="unknown" v-else>
                    {{ translate('user_unknown') }}
                </strong>
            </div>

            <div class="grow">
                <span class="text-xs text-neutral-content" v-if="!message.group">
                    {{ message.created_at }}
                </span>
            </div>

            <div class="message-options mr-1" v-if="message.can_delete">
                <div v-bind:class="dropdownClass()" v-click-outside="onClickOutside">
                    <a v-on:click="openDropdown()" role="button">
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li><a role="button" v-on:click="editMessage(message)">{{ translate('edit') }}</a></li>
                        <li><a role="button" v-on:click="deleteMessage(message)">{{ translate('remove') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="comment-text">
            {{ message.message }}
            <span class="text-xs text-neutral-content italic" v-if="message.is_updated" v-bind:title="message.updated_at">{{ translate('is_updated') }}</span>
        </div>
    </div>
</template>

<script>
    import vClickOutside from "click-outside-vue3"
    /**
     * Don't do any of the heavy lifting here, just send some events to Messages for figuring stuff out
     */
    export default {
        directives: {
            clickOutside: vClickOutside.directive
        },
        props: [
            'message',
            'trans',
        ],
        data() {
            return {
                openedDropdown: false
            }
        },
        computed: {
            isUser: function() {
                return this.message.user !== null;
            },
            isCharacter: function() {
                return this.message.character !== null;
            },
        },

        methods: {
            deleteMessage: function(message) {
                this.emitter.emit('delete_message', message);
            },
            editMessage: function(message) {
                this.emitter.emit('edit_message', message);
            },
            translate(key) {
                return this.trans[key] ?? 'unknown';
            },
            dropdownClass() {
                return this.openedDropdown ? 'open dropdown relative' : 'dropdown relative';
            },
            openDropdown() {
                return this.openedDropdown = true;
            },
            boxClasses: function (message) {
                let classes = 'box-comment bg-base-200 px-1 py-3 flex flex-col gap-1';
                classes += ' message-author-' + message.from_id;
                classes += ' message-real-author-' + message.created_by;

                if (message.group) {
                    classes += ' message-followup';
                } else {
                    classes += ' message-first mt-2'
                }
                return classes;
            },
            onClickOutside (event) {
                //console.log('Clicked outside. Event: ', event)
                this.openedDropdown = false;
            },
        },
    }
</script>
