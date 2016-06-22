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

    // Setup form fields
    'setup' => [
        'email'            => 'Correo electrónico',
        'username'         => 'Nombre de usario',
        'password'         => 'Contraseña',
        'site_name'        => 'Nombre del sitio',
        'site_domain'      => 'Domain ihrer Seite',
        'site_timezone'    => 'Wählen Sie Ihre Zeitzone',
        'site_locale'      => 'Wählen Sie Ihre Sprache',
        'enable_google2fa' => 'Google Zwei-Faktor-Authentifizierung aktivieren',
        'cache_driver'     => 'Cache-Treiber',
        'session_driver'   => 'Sitzungs-Treiber',
    ],

    // Login form fields
    'login' => [
        'login'         => 'Nombre de usuario o dirección de correo electrónico',
        'email'         => 'Correo electrónico',
        'password'      => 'Contraseña',
        '2fauth'        => 'Authentifizierungscode',
        'invalid'       => 'Nombre de usuario o contraseña incorrectos',
        'invalid-token' => 'Token ist ungültig',
        'cookies'       => 'Sie müssen Cookies aktivieren um sich anzumelden.',
    ],

    // Incidents form fields
    'incidents' => [
        'name'               => 'Name',
        'status'             => 'Status',
        'component'          => 'Komponente',
        'message'            => 'Nachricht',
        'message-help'       => 'Sie können auch Markdown verwenden.',
        'scheduled_at'       => 'Für wann ist die Wartung geplant?',
        'incident_time'      => 'Wann ist dieser Vorfall aufgetreten?',
        'notify_subscribers' => 'Abonnenten benachrichtigen',
        'visibility'         => 'Visibilidad del incidente',
        'public'             => 'Öffentlich sichtbar',
        'logged_in_only'     => 'Nur für angemeldete Benutzer sichtbar',
        'templates'          => [
            'name'     => 'Nombre',
            'template' => 'Vorlage',
            'twig'     => 'Las plantillas de incidentes pueden hacer uso del lenguaje de plantillas <a href="http://twig.sensiolabs.org/" target="_blank">Twig</a>.',
        ],
    ],

    // Components form fields
    'components' => [
        'name'        => 'Nombre',
        'status'      => 'Estatus',
        'group'       => 'Gruppe',
        'description' => 'Beschreibung',
        'link'        => 'Link',
        'tags'        => 'Schlagwörter',
        'tags-help'   => 'Durch Kommata trennen.',
        'enabled'     => 'Component enabled?',

        'groups' => [
            'name'               => 'Nombre',
            'collapsing'         => 'Elegir la visibilidad del grupo',
            'visible'            => 'Siempre expandido',
            'collapsed'          => 'Contraer el grupo por defecto',
            'collapsed_incident' => 'Contraer el grupo, pero ampliar si hay problemas',
        ],
    ],

    // Metric form fields
    'metrics' => [
        'name'             => 'Name',
        'suffix'           => 'Suffix',
        'description'      => 'Beschreibung',
        'description-help' => 'Sie können auch Markdown verwenden.',
        'display-chart'    => 'Diagramm auf der Statusseite anzeigen?',
        'default-value'    => 'Standardwert',
        'calc_type'        => 'Berechnung der Metrik',
        'type_sum'         => 'Summe',
        'type_avg'         => 'Durchschnitt',
        'places'           => 'Cantidad de decimales',
        'default_view'     => 'Vista predeterminada',

        'points' => [
            'value' => 'Wert',
        ],
    ],

    // Settings
    'settings' => [
        /// Application setup
        'app-setup' => [
            'site-name'              => 'Nombre del sitio',
            'site-url'               => 'URL ihrer Seite',
            'display-graphs'         => 'Graphen auf der Statusseite anzeigen?',
            'about-this-page'        => 'Über diese Seite',
            'days-of-incidents'      => 'Wie viele Tage mit Vorfällen sollen gezeigt werden?',
            'banner'                 => 'Imagen del banner',
            'banner-help'            => 'Es wird empfohlen, dass Sie keine Dateien die breiter als 930 Pixel sind hochladen .',
            'subscribers'            => 'Personen die Anmeldung für E-Mail-Benachrichtigung erlauben?',
        ],
        'analytics' => [
            'analytics_google'       => 'Google Analytics Code',
            'analytics_gosquared'    => 'GoSquared Analytics Code',
            'analytics_piwik_url'    => 'URL der Piwik-Instanz (ohne http(s)://)',
            'analytics_piwik_siteid' => 'Piwik\'s Seiten-ID',
        ],
        'localization' => [
            'site-timezone'          => 'Zeitzone ihrer Seite',
            'site-locale'            => 'Sprache ihrer Seite',
            'date-format'            => 'Datumsformat',
            'incident-date-format'   => 'Vorfall Zeitstempel-Format',
        ],
        'security' => [
            'allowed-domains'      => 'Erlaubte Domains',
            'allowed-domains-help' => 'Durch Kommata trennen. Die oben genannte Domain ist standardmäßig erlaubt.',
        ],
        'stylesheet' => [
            'custom-css' => 'Hoja de estilo personalizada',
        ],
        'theme' => [
            'background-color'        => 'Color de fondo',
            'background-fills'        => 'Relleno del fondo (componentes, incidentes, pie)',
            'banner-background-color' => 'Banner Background Color',
            'banner-padding'          => 'Banner Padding',
            'fullwidth-banner'        => 'Enable fullwidth banner?',
            'text-color'              => 'Color del texto',
            'dashboard-login'         => '¿Mostrar el botón de Panel de Control en el pie?',
            'reds'                    => 'Rojo (usado para errores)',
            'blues'                   => 'Azul (usado para información)',
            'greens'                  => 'Verde (usado para operaciones correctas)',
            'yellows'                 => 'Amarillo (usado para alertas)',
            'oranges'                 => 'Naranja (usado para avisos)',
            'metrics'                 => 'Relleno de las métricas',
            'links'                   => 'Enlaces',
        ],
    ],

    'user' => [
        'username'       => 'Benutzername',
        'email'          => 'Correo electrónico',
        'password'       => 'Contraseña',
        'api-token'      => 'API Token',
        'api-token-help' => 'Wenn sie ihren API-Token neu generieren, können bestehende Anwendungen nicht mehr auf Cachet zugreifen.',
        'gravatar'       => 'Change your profile picture at Gravatar.',
        'user_level'     => 'Nivel de usuario',
        'levels'         => [
            'admin' => 'Administrador',
            'user'  => 'Usuario',
        ],
        '2fa' => [
            'help' => 'Die Zwei-Faktor-Authentifizierung erhöht die Sicherheit Ihres Kontos. Sie benötigen <a href="https://support.google.com/accounts/answer/1066447?hl=en">Google Authenticator</a> oder eine ähnliche App auf Ihrem Mobilgerät. Beim Anmelden werden sie aufgefordert, einen Token einzugeben, der von der App generiert wird.',
        ],
        'team' => [
            'description' => 'Invite your team members by entering their email addresses here.',
            'email'       => 'Email #:id',
        ],
    ],

    // Buttons
    'add'    => 'Hinzufügen',
    'save'   => 'Speichern',
    'update' => 'Aktualisieren',
    'create' => 'Erstellen',
    'edit'   => 'Bearbeiten',
    'delete' => 'Löschen',
    'submit' => 'Abschicken',
    'cancel' => 'Abbrechen',
    'remove' => 'Entfernen',
    'invite' => 'Invitar',
    'signup' => 'Registrarse',

    // Other
    'optional' => '* optional',
];
