<?php

$PluginInfo['FirePHP'] = [
    'Name' => 'FirePHP',
    'Description' => 'Logs variables from PHP to the browser (Firebug Console). Needs the <a href="http://www.firephp.org/">FirePHP</a> browser extension to be installed.',
    'Version' => '0.1',
    'RequiredApplications' => ['Vanilla' => '>= 2.2'],
    'RequiredPlugins' => false,
    'RequiredTheme' => false,
    'SettingsUrl' => 'settings/firephp',
    'SettingsPermission' => 'Garden.Settings.Manage',
    'MobileFriendly' => true,
    'Author' => 'Robin Jurinka',
    'AuthorUrl' => 'http://vanillaforums.org/profile/r_j',
    'License' => 'MIT'
];

require(__DIR__.'/vendor/firephp/firephp-core/lib/FirePHPCore/fb.php');

class FirePHPPlugin extends Gdn_Plugin {
    public function settingsController_firePHP_create($sender, $args) {
        Gdn::session()->checkpermission('Garden.Settings.Manage');

        $sender->addSideMenu('dashboard/settings/plugins');
        $sender->title('FirePHP examples');

        fb('Hello World'); // Defaults to FirePHP::LOG.

        fb('Log message', FirePHP::LOG);
        fb('Info message', FirePHP::INFO);
        fb('Warn message', FirePHP::WARN);
        fb('Error message', FirePHP::ERROR);

        fb('Message with label', 'Label', FirePHP::LOG);

        fb(
            array(
                'key1' => 'val1',
                'key2' => array(array('v1', 'v2'), 'v3')
            ),
            'TestArray',
            FirePHP::LOG
        );

        fb(array('2 SQL queries took 0.06 seconds', array(
           array('SQL Statement', 'Time', 'Result'),
           array('SELECT * FROM Foo', '0.02', array('row1', 'row2')),
           array('SELECT * FROM Bar', '0.04', array('row1', 'row2'))
          )), FirePHP::TABLE);

        // Will show only in "Server" tab for the request.
        fb(apache_request_headers(), 'RequestHeaders', FirePHP::DUMP);

        $sender->render($this->getView('settings.php'));
    }
}
