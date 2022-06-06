<?php

return [
    'actions'       => [
        'add_epoch'         => '添加纪元',
        'add_intercalary'   => '添加闰日',
        'add_month'         => '添加一月',
        'add_moon'          => '添加月相',
        'add_reminder'      => '添加事件提示',
        'add_season'        => '添加季节',
        'add_weather'       => '设置天气效果',
        'add_week'          => '添加命名周',
        'add_weekday'       => '添加工作日',
        'add_year'          => '添加特殊年名',
        'set_today'         => '设为今日',
        'today'             => '今天',
    ],
    'checkboxes'    => [
        'is_recurring'  => '每年发生',
    ],
    'create'        => [
        'title' => '新日历',
    ],
    'destroy'       => [],
    'edit'          => [
        'today' => '日历日期已更新。',
    ],
    'event'         => [
        'actions'   => [
            'existing'  => '已存在实体',
            'new'       => '新事件',
            'switch'    => '改变选择',
        ],
        'create'    => [
            'success'   => '已创建日历事件',
            'title'     => '向:name添加事件',
        ],
        'destroy'   => '已从:name移除事件提示。',
        'edit'      => [
            'success'   => '事件提示已更新。',
            'title'     => '为:name更新事件提示',
        ],
        'helpers'   => [
            'add'               => '向日历增加已有事件。',
            'new'               => '或是创建一个新事件(只需名称)。',
            'other_calendar'    => '你正在编辑:calendar中的事件提示。',
        ],
        'modal'     => [
            'title' => '向日历添加事件',
        ],
        'success'   => '成功向日历添加事件提示：:event',
    ],
    'events'        => [
        'filters'   => [
            'show_all'  => '显示全部',
        ],
        'title'     => ':name中的事件',
    ],
    'fields'        => [
        'calendar'              => '父日历',
        'calendars'             => '日历',
        'colour'                => '颜色',
        'comment'               => '评注',
        'current_day'           => '当前日',
        'current_month'         => '当前月',
        'current_year'          => '当前年',
        'date'                  => '当前日期',
        'day'                   => '日',
        'default_layout'        => '默认布局',
        'has_leap_year'         => '存在闰年',
        'intercalary'           => '闰日',
        'is_incrementing'       => '日期推进',
        'is_recurring'          => '重复发生',
        'leap_year_amount'      => '添加日',
        'leap_year_month'       => '月',
        'leap_year_offset'      => '每',
        'leap_year_start'       => '闰年',
        'length'                => '事件长度',
        'length_days'           => ':count天|:count天',
        'month'                 => '月',
        'months'                => '月',
        'moons'                 => '月相',
        'name'                  => '名称',
        'parameters'            => '参数',
        'recurring_periodicity' => '重复周期',
        'recurring_until'       => '重复至年份',
        'reset'                 => '每周重置',
        'seasons'               => '季节',
        'start_offset'          => '起始偏移量',
        'suffix'                => '后缀',
        'type'                  => '种类',
        'week_names'            => '周名',
        'weekdays'              => '工作日',
        'year'                  => '年',
    ],
    'helpers'       => [
        'month_type'    => '闰月不使用工作日，但仍然影响月亮和季节。',
        'nested_parent' => '显示:parent的日历',
        'nested_without'=> '显示所有没有父日历的日历。点击某一行以查看子日历。',
        'start_offset'  => '日历默认从第0年的第一个工作日开始。修改该项会影响日历第一日的位置。',
    ],
    'hints'         => [
        'event_length'  => '活动持续的时间。一个活动周期不能超过2个月。',
    ],
];
