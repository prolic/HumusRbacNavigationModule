HumusRbacNavigationModule
=========================

[![Build Status](https://travis-ci.org/prolic/HumusRbacNavigationModule.svg?branch=master)](https://travis-ci.org/prolic/HumusRbacNavigationModule)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/prolic/HumusRbacNavigationModule/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/prolic/HumusRbacNavigationModule/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/prolic/HumusRbacNavigationModule/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/prolic/HumusRbacNavigationModule/?branch=master)
[![License](https://poser.pugx.org/prolic/humus-rbac-navigation-module/license.svg)](https://packagist.org/packages/prolic/humus-rbac-navigation-module)
[![Total Downloads](https://poser.pugx.org/prolic/humus-rbac-navigation-module/downloads.svg)](https://packagist.org/packages/prolic/humus-rbac-navigation-module)

Integration of ZfcRbac and SpiffyNavigation for Zend Framework 2

Dependencies
------------

 - PHP 5.4.0
 - [SpiffyNavigation](https://github.com/spiffyjr/spiffy-navigation/)
 - [Zfr-Rbac](https://github.com/zf-fr/rbac/)
 - [ZF-Commons Rbac](https://github.com/ZF-Commons/zfc-rbac/)
 - [Zend-Mvc 2.3.0](https://github.com/zendframework/zf2/tree/master/library/Zend/Mvc)

Installation
------------

 1.  Add `"prolic/humus-rbac-navigation-module": "dev-master"` to your `composer.json`
 2.  Run `php composer.phar install`
 3.  Enable the module in your `config/application.config.php` by adding `HumusRbacNavigationModule` to `modules`

Example-Configuration
---------------------

    return array(
        'modules' => array(
            'ZfcRbac',
            'SpiffyNavigation',
            'HumusRbacNavigationModule',
        )
    );

Usage
-----

Create your navigation using SpiffyNavigation as usual,
you can either set the "role" or the "permission" option to any route.

The navigation entries will be hidden in SpiffyNavigation automatically.
