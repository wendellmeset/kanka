<?php

return [
    'actions'       => [
        'return'        => 'Назад к списку событий',
        'send'          => 'Участвовать',
        'show_ongoing'  => 'Смотреть или участвовать',
        'show_past'     => 'Показать событие и победителей',
        'update'        => 'Обновить заявку',
        'view'          => 'Показать объект',
    ],
    'description'   => 'Мы регулярно проводим связанные с ворлд-билдингом события для нашего сообщества и рассматриваем статьи, понравившиеся нам больше всего.',
    'fields'        => [
        'comment'       => 'Комментарий',
        'entity_link'   => 'Ссылка на объект',
        'honorable'     => 'Похвальный отзыв',
        'rank'          => 'Результат',
        'submitter'     => 'Участник',
    ],
    'index'         => [
        'ongoing'   => 'Текущие события',
        'past'      => 'Прошедшие события',
    ],
    'participate'   => [
        'description'   => 'Появилось вдохновение? Создайте объект в одной из ваших публичных кампаний и пришлите нам ссылку на него в форме ниже. Вы в любой момент можете изменить или удалить вашу заявку.',
        'login'         => 'Чтобы участвовать в событии, войдите в свой аккаунт.',
        'participated'  => 'Вы уже отправили заявку для этого события. Можете изменить или удалить ее.',
        'success'       => [
            'modified'  => 'Изменения вашей заявки сохранены.',
            'removed'   => 'Ваша заявка удалена.',
            'submit'    => 'Ваша заявка отправлена. Вы можете в любой момент изменить или удалить ее.',
        ],
        'title'         => 'Участие в событии',
    ],
    'placeholders'  => [
        'comment'       => 'Комментарий к заявке (не обязательно)',
        'entity_link'   => 'Скопируйте сюда ссылку на объект.',
    ],
    'results'       => [
        'description'       => 'Наше жюри выбрало победителями события следующие заявки.',
        'scheduled'         => 'Это событие начнется :start.',
        'title'             => 'Победители',
        'waiting_results'   => 'Событие закончилось! Жюри рассмотрит заявки и определит победителей, которые будут показаны здесь.',
    ],
    'show'          => [
        'participants'  => 'Подано заявок: :number',
        'title'         => 'Событие ":name"',
    ],
    'title'         => 'События',
];
