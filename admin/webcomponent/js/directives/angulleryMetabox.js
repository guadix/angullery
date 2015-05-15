(function () {
    "use strict";

    angular
        .module('angullery-admin')
        .directive('angulleryMetabox', function(PLUGINPATH) {

            return {
                restrict: 'E',
                templateUrl: PLUGINPATH + 'admin/webcomponent/js/templates/metabox_directive.html',
            };
        });
})();
