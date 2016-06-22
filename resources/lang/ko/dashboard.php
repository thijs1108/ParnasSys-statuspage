<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    'dashboard' => '대시보드',

    // Incidents
    'incidents' => [
        'title'                    => '문제 및 예정',
        'incidents'                => '문제',
        'logged'                   => '{0} 아무 문제가 없습니다, 잘하고 있어요.|하나의 문제에 대한 로깅이 있습니다.|<strong>:count</strong> 개의 문제가 리포트 되었습니다.',
        'incident-create-template' => '템플릿 생성',
        'incident-templates'       => '문제 템플릿',
        'add'                      => [
            'title'   => '문제 추가',
            'success' => 'Incident added.',
            'failure' => 'There was an error adding the incident, please try again.',
        ],
        'edit' => [
            'title'   => '문제 수정',
            'success' => '문제가 수정되었습니다.',
            'failure' => 'There was an error editing the incident, please try again.',
        ],
        'delete' => [
            'success' => 'The incident has been deleted and will not show on your status page.',
            'failure' => 'The incident could not be deleted, please try again.',
        ],

        // Incident templates
        'templates' => [
            'title' => '문제 템플릿',
            'add'   => [
                'title'   => '문제 템플릿 생성하기',
                'message' => 'You should add an incident template.',
                'success' => 'Your new incident template has been created.',
                'failure' => 'Something went wrong with the incident template.',
            ],
            'edit' => [
                'title'   => '문제 템플릿 수정',
                'success' => 'The incident template has been updated.',
                'failure' => 'Something went wrong updating the incident template',
            ],
            'delete' => [
                'success' => 'The incident template has been deleted.',
                'failure' => 'The incident template could not be deleted, please try again.',
            ],
        ],
    ],

    // Incident Maintenance
    'schedule' => [
        'schedule'     => '예약 된 유지 관리',
        'logged'       => '{0} There are no schedules, good work.|You have logged one schedule.|You have reported <strong>:count</strong> schedules.',
        'scheduled_at' => ':timestamp 에 예정됨',
        'add'          => [
            'title'   => 'Add Scheduled Maintenance',
            'success' => 'Schedule added.',
            'failure' => 'Something went wrong adding the schedule, please try again.',
        ],
        'edit' => [
            'title'   => 'Edit Scheduled Maintenance',
            'success' => 'Schedule has been updated!',
            'failure' => 'Something went wrong editing the schedule, please try again.',
        ],
        'delete' => [
            'success' => 'The scheduled maintenance has been deleted and will not show on your status page.',
            'failure' => 'The scheduled maintenance could not be deleted, please try again.',
        ],
    ],

    // Components
    'components' => [
        'components'         => '구성 요소',
        'component_statuses' => '구성요소 상태',
        'listed_group'       => ':name 그룹',
        'add'                => [
            'title'   => '구성요소 추가',
            'message' => '구성요소를 추가해야 합니다.',
            'success' => 'Component created.',
            'failure' => 'Something went wrong with the component, please try again.',
        ],
        'edit' => [
            'title'   => '구성요소 수정',
            'success' => 'Component updated.',
            'failure' => 'Something went wrong with the component, please try again.',
        ],
        'delete' => [
            'success' => 'The component has been deleted!',
            'failure' => 'The component could not be deleted, please try again.',
        ],

        // Component groups
        'groups' => [
            'groups'        => '구성요소 그룹|구성요소 그룹',
            'no_components' => '구성 요소 그룹을 추가 해야 합니다.',
            'add'           => [
                'title'   => '구성요소 그룹 추가',
                'success' => 'Component group added.',
                'failure' => 'Something went wrong with the component group, please try again.',
            ],
            'edit' => [
                'title'   => '구성요소 그룹 수정',
                'success' => 'Component group updated.',
                'failure' => 'Something went wrong with the component group, please try again.',
            ],
            'delete' => [
                'success' => 'Component group has been deleted!',
                'failure' => 'The component group could not be deleted, please try again.',
            ],
        ],
    ],

    // Metrics
    'metrics' => [
        'metrics' => '통계',
        'add'     => [
            'title'   => '통계 추가',
            'message' => 'You should add a metric.',
            'success' => 'Metric created.',
            'failure' => 'Something went wrong with the metric, please try again.',
        ],
        'edit' => [
            'title'   => '통계 수정',
            'success' => 'Metric updated.',
            'failure' => 'Something went wrong with the metric, please try again.',
        ],
        'delete' => [
            'success' => 'The metric has been deleted and will no longer display on your status page.',
            'failure' => 'The metric could not be deleted, please try again.',
        ],
    ],
    // Subscribers
    'subscribers' => [
        'subscribers'      => '구독자',
        'description'      => 'Subscribers will receive email updates when incidents are created or components are updated.',
        'verified'         => '인증됨',
        'not_verified'     => '인증되지 않음',
        'subscriber'       => ':email, subscribed :date',
        'no_subscriptions' => 'Subscribed to all updates',
        'add'              => [
            'title'   => '구독자 추가',
            'success' => '구독자가 추가됨.',
            'failure' => 'Something went wrong adding the subscriber, please try again.',
        ],
        'edit' => [
            'title'   => '구독자 업데이트',
            'success' => '구독자가 업데이트됨.',
            'failure' => 'Something went wrong editing the subscriber, please try again.',
        ],
    ],

    // Team
    'team' => [
        'team'        => '팀',
        'member'      => '멤버',
        'profile'     => '프로필',
        'description' => '팀 멤버는 구성요소와 문제를 추가하고 수정 할 수 있습니다.',
        'add'         => [
            'title'   => '새 팀 멤버 추가',
            'success' => 'Team member added.',
            'failure' => 'The team member could not be added, please try again.',
        ],
        'edit' => [
            'title'   => '프로필 수정',
            'success' => 'Profile updated.',
            'failure' => 'Something went wrong updating the profile, please try again.',
        ],
        'delete' => [
            'success' => '사용자 삭제',
            'failure' => 'The team member could not be added, please try again.',
        ],
        'invite' => [
            'title'   => '새 팀 멤버 초대하기',
            'success' => '사용자가 초대되었습니다.',
            'failure' => 'The invite could not be sent, please try again.',
        ],
    ],

    // Settings
    'settings' => [
        'settings'  => '설정',
        'app-setup' => [
            'app-setup'   => '애플리케이션 설정',
            'images-only' => '이미지만 업로드 할 수 있습니다.',
            'too-big'     => '업로드 한 파일이 너무 큽니다. :size 보다 작은 이미지를 올려주세요.',
        ],
        'analytics' => [
            'analytics' => 'Analytics',
        ],
        'localization' => [
            'localization' => 'Localization',
        ],
        'customization' => [
            'customization' => 'Customization',
            'header'        => 'Custom Header HTML',
            'footer'        => 'Custom Footer HTML',
        ],
        'security' => [
            'security'   => '보안',
            'two-factor' => '2단계 인증을 사용하지 않는 사용자',
        ],
        'stylesheet' => [
            'stylesheet' => '스타일시트',
        ],
        'theme' => [
            'theme' => '테마',
        ],
        'edit' => [
            'success' => '설정이 저장되었습니다.',
            'failure' => '설정을 저장할 수 없습니다.',
        ],
    ],

    // Login
    'login' => [
        'login'      => '로그인',
        'logged_in'  => '로그인 되었습니다.',
        'welcome'    => '안녕하세요!',
        'two-factor' => '토큰을 입력해주세요.',
    ],

    // Sidebar footer
    'help'        => '도움말',
    'status_page' => '상태 페이지',
    'logout'      => '로그아웃',

    // Notifications
    'notifications' => [
        'notifications' => '알림',
        'awesome'       => '좋아요.',
        'whoops'        => '이런...',
    ],

    // Welcome modal
    'welcome' => [
        'welcome' => 'Welcome to your status page!',
        'message' => '상태 페이지는 거의 다 준비 되었습니다! 추가 설정을 해보세요',
        'close'   => 'Take me straight to my dashboard',
        'steps'   => [
            'component'  => '구성요소 만들기',
            'incident'   => '문제 만들기',
            'customize'  => '사용자 지정',
            'team'       => '사용자 추가',
            'api'        => 'API 토큰 생성',
            'two-factor' => '2단계 인증',
        ],
    ],

];
