(()=>{"use strict";function e(){$.each($(".delete-confirm"),(function(){$(this).click((function(e){var i=$(this).data("name"),n=$(this).data("delete-target"),a=$(this).data("target");$(a).find(".target-name").text(i),$(this).data("mirrored")?$("#delete-confirm-mirror").show():$("#delete-confirm-mirror").hide(),$(this).data("recoverable")?($(a).find(".permanent").hide(),$(a).find(".recoverable").show()):($(a).find(".recoverable").hide(),$(a).find(".permanent").show()),n&&$(".delete-confirm-submit").data("target",n)}))})),$.each($(".delete-confirm-submit"),(function(e){$(this).unbind("click"),$(this).click((function(e){var i=$(this).data("target");i?($("#"+i+" input[name=remove_mirrored]").val($("#delete-confirm-mirror-checkbox").is(":checked")?1:0),$("#"+i).submit()):$("#delete-confirm-form").submit()}))})),$.each($(".click-confirm"),(function(e){$(this).click((function(e){var i=$(this).data("message");$("#click-confirm-text").text(i),$("#click-confirm-url").attr("href",$(this).data("url"))}))}))}var i,n,a,t,r,o;function c(){$(".map-legend-marker").click((function(e){e.preventDefault(),window.map.panTo(L.latLng($(this).data("lat"),$(this).data("lng"))),window[$(this).data("id")].openPopup()})),$("a.sidebar-toggle").click((function(){m()}))}function m(){setTimeout((function(){window.map.invalidateSize()}),500)}$(document).ready((function(){window.map.invalidateSize(),window.map.on("popupopen",(function(i){e()})),$('a[href="#marker-pin"]').click((function(e){$('input[name="shape_id"]').val(1),$("#map-marker-bg-colour").show()})),$('a[href="#marker-label"]').click((function(e){$('input[name="shape_id"]').val(2),$("#map-marker-bg-colour").hide()})),$('a[href="#marker-circle"]').click((function(e){$('input[name="shape_id"]').val(3),$("#map-marker-bg-colour").show()})),$('a[href="#marker-poly"]').click((function(e){$('input[name="shape_id"]').val(5),$("#map-marker-bg-colour").show()})),$('a[href="#form-markers"]').click((function(e){window.map.invalidateSize()})),function(){if(0===(i=$("#map-body")).length)return;n=$("#sidebar-map"),a=$("#sidebar-marker"),t=$("#map-marker-modal"),o=$("#map-marker-modal-title"),r=$("#map-marker-modal-content"),$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),window.markerDetails=function(c){!function(){if(window.kankaIsMobile.matches)return r.find(".spinner").show(),r.find(".content").hide(),void t.modal("toggle");i.removeClass("sidebar-collapse").addClass("sidebar-open"),n.hide(),a.html(""),a.parent().find(".spinner").show(),m()}(),window.kankaIsMobile.matches&&(c+="?mobile=1"),$.ajax({url:c,type:"GET",async:!0,success:function(t){t&&(window.kankaIsMobile.matches?(o.html(t.name),r.find(".content").html(t.body),r.find(".spinner").hide()):(a.html(t.body).parent().find(".spinner").hide(),$(".marker-close").click((function(e){a.hide(),n.show()})),i.addClass("sidebar-open")),e())}})},c()}(),function(){$('select[name="size_id"]').change((function(e){6==this.value?($(".map-marker-circle-helper").hide(),$(".map-marker-circle-radius").show()):($(".map-marker-circle-radius").hide(),$(".map-marker-circle-helper").show())}));var e=$("#map-layer-form"),i=$("#map-marker-form"),n=$("#map-group-form");if(0===$("#entity-form").length&&0===$(".map-marker-edit-form").length)return;e.unbind("submit").on("submit",(function(){window.entityFormHasUnsavedChanges=!1})),i.unbind("submit").on("submit",(function(){window.entityFormHasUnsavedChanges=!1})),n.unbind("submit").on("submit",(function(){window.entityFormHasUnsavedChanges=!1})),c()}(),$(".map-marker-entry-click").click((function(e){e.preventDefault(),$(this).parent().hide(),$(".map-marker-entry-entry").show()}))}))})();