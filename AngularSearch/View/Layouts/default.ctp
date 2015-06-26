<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->css(
                array('bootstrap.min.css',
                    'style.css'));
        ?>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/angular.min.js"></script>
        <script type="text/javascript" src="js/ui-bootstrap-tpls-0.9.0.js"></script>

        <script>

            var app = angular.module('PostalCodeSearchAutoComplete', ['ui.bootstrap']);
            function autocompleteController($scope, $http, limitToFilter) {
                $scope.cities = function (cityName) {
                    return $http.get("<?php echo $this->webroot; ?>pages/citybypostal?callback=RaiseForMe_CallBackSearch&filter=US&q=" + cityName).then(function (response) {
                        return limitToFilter(response.data, 15);
                    });
                };
            }
        </script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>Search example</h1>
            </div>
            <div id="content">

                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">

                <p>
                    <a href="http://www.planetwebsolution.com/" >Planet web solutions</a>
                </p>
            </div>
        </div>
        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>
