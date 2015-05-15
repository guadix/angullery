(function () {
    "use strict";

    angular
        .module('angullery-admin')
        .directive('angulleryMetabox', function(PLUGINPATH) {

            return {
                restrict: 'E',
                templateUrl: PLUGINPATH + 'admin/templates/metabox_directive.html',
            };
        });
})();
