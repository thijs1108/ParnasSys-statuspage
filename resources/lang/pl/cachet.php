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
    // Components
    'components' => [
        'last_updated' => 'Ostatnia aktualizacja :timestamp',
        'status'       => [
            1 => 'Funktionsfähig',
            2 => 'Leistungsprobleme',
            3 => 'Teilweiser Ausfall',
            4 => 'Schwerer Ausfall',
        ],
        'group' => [
            'other' => 'Pozostałe komponenty',
        ],
    ],

    // Incidents
    'incidents' => [
        'none'          => 'Brak zgłoszonych incydentów',
        'past'          => 'Vergangene Vorfälle',
        'previous_week' => 'Vorherige Woche',
        'next_week'     => 'Nächste Woche',
        'scheduled'     => 'Geplante Wartungen',
        'scheduled_at'  => ', geplant :timestamp',
        'status'        => [
            0 => 'Geplant', // TODO: Hopefully remove this.
            1 => 'Untersuchungen laufen',
            2 => 'Identifiziert',
            3 => 'Unter Beobachtung',
            4 => 'Behoben',
        ],
    ],

    // Service Status
    'service' => [
        'good'  => '[0,1] System działa poprawnie|[2,Inf] Wszystkie systemy działają poprawnie',
        'bad'   => '[0,1] W systemie obecnie występują problemy|[2,Inf] W niektórych systemach występują problemy',
        'major' => '[0,1] Usługa jest poważnie przeciążona|[2,Inf] Niektóre systemy są poważnie przeciążone',
    ],

    'api' => [
        'regenerate' => 'API-Schlüssel neu generieren',
        'revoke'     => 'API-Schlüssel widerrufen',
    ],

    // Metrics
    'metrics' => [
        'filter' => [
            'last_hour' => 'Ostatnia godzina',
            'hourly'    => 'Letzte 12 Stunden',
            'weekly'    => 'Wöchentlich',
            'monthly'   => 'Monatlich',
        ],
    ],

    // Subscriber
    'subscriber' => [
        'subscribe' => 'Abonnieren Sie um die neuesten Updates zu erhalten.',
        'button'    => 'Abonnieren',
        'manage'    => [
            'no_subscriptions' => 'Jesteś obecnie zapisany na wszystkie aktualizacje.',
            'my_subscriptions' => 'Jesteś obecnie zapisany na poniższe aktualizacje.',
        ],
        'email' => [
            'subscribe'          => 'Aktualisierungen per E-Mail abonnieren.',
            'subscribed'         => 'Sie haben E-Mail-Benachrichtigungen abonniert, überprüfen Sie bitte Ihre E-Mail, um Ihr Abonnement zu bestätigen.',
            'verified'           => 'Ihre E-Mail-Abonnement ist bestätigt worden. Danke!',
            'manage'             => 'Zarządzaj subskrypcją.',
            'unsubscribe'        => 'Von E-Mail-Updates deabonnieren.',
            'unsubscribed'       => 'Ihre E-Mail-Abonnement wurde gekündigt.',
            'failure'            => 'Etwas ist mit dem Abonnement schief gelaufen.',
            'already-subscribed' => 'Subskrypcja niemożliwa, :email jest już zapisany.',
            'verify'             => [
                'text'           => "Bitte bestätigen Sie Ihre E-Mail-Abonnement zu :app_name Status-Aktualisierungen.\n:link\nDanke, :app_name",
                'html-preheader' => 'Bitte bestätigen Sie Ihre E-Mail-Abonnement zu :app_name Status-Aktualisierungen.',
                'html'           => '<p>Bestätigen Sie bitte Ihr E-Mail-Abonnement für :app_name Statusaktualisierungen.</p><p><a href=":link">:link</a></p><p>Danke, :app_name</p>',
            ],
            'maintenance' => [
                'text'           => "Neue Wartung wurde für :app_name geplant.\nDanke, :app_name",
                'html-preheader' => 'Neue Wartung wurde für :app_name geplant.',
                'html'           => '<p>Neue Wartung wurde für :app_name geplant.</p>',
            ],
            'incident' => [
                'text'           => "Ein neuer Vorfall wurde auf :app_name berichtet.\nDanke, :app_name",
                'html-preheader' => 'Ein neuer Vorfall wurde über :app_name berichtet.',
                'html'           => '<p>Ein neuer Vorfall wurde über :app_name berichtet.</p> <p>Danke, :app_name</p>',
            ],
            'component' => [
                'subject'        => 'Aktualizacje komponentu',
                'text'           => 'Komponent :component_name zmienił status. Aktualnie jest w :component_human_status.\nDziękujemy, :app_name',
                'html-preheader' => 'Aktualizacja komponentu z :app_name',
                'html'           => '<p>Komponent :component_name zmienił status. Aktualnie jest w :component_human_status.</p><p>Dziękujemy, :app_name</p>',
                'tooltip-title'  => 'Subskrybuj powiadomienia dla :component_name.',
            ],
        ],
    ],

    'users' => [
        'email' => [
            'invite' => [
                'text'           => "Zostałeś zaproszony do strony statusowej zespołu :app_name. Aby się zapisać, kliknij na link umieszczony dalej.\n:link\nDziękujemy, :app_name",
                'html-preheader' => 'Zostałeś zaproszony do zespołu :app_name.',
                'html'           => '<p>Zostałeś zaproszony do strony statusowej zespołu :app_name. Aby się zapisać, kliknij na link umieszczony dalej.</p><p><a href=":link">:link</a></p><p>Dziękujemy, :app_name</p>',
            ],
        ],
    ],

    'signup' => [
        'title'    => 'Zarejestruj się',
        'username' => 'Benutzername',
        'email'    => 'E-Mail',
        'password' => 'Passwort',
        'success'  => 'Twoje konto zostało utworzone.',
        'failure'  => 'Coś poszło nie tak w trakcje rejestracji.',
    ],

    'system' => [
        'update' => 'Nowsza wersja Cachet\'a jest dostępna. Kliknij <a href="https://docs.cachethq.io/docs/updating-cachet">tutaj</a>, aby dowiedzieć się jak dokonać aktualizacji!',
    ],

    // Modal
    'modal' => [
        'close'     => 'Zamknij',
        'subscribe' => [
            'title'  => 'Subskrybuj aktualizacje komponentu',
            'body'   => 'Podaj swój adres email w celu subskrypcji aktualizacji dla tego komponentu. Jeśli byłeś już zapisany, otrzymujesz aktualizacje dla tego komponentu.',
            'button' => 'Abonnieren',
        ],
    ],

    // Other
    'home'            => 'Strona Główna',
    'description'     => 'Bądź na bieżąco z aktualizacjami z :app.',
    'powered_by'      => ':app Status-Seite betrieben mit <a href="https://cachethq.io">Cachet</a>.',
    'about_this_site' => 'Über diese Seite',
    'rss-feed'        => 'RSS',
    'atom-feed'       => 'Atom',
    'feed'            => 'Status-Feed',

];
