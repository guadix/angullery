(function(){
	"use strict";
	var app = angular
		.module('angullery-admin', [])
		.constant('PLUGINPATH', '/wp-content/plugins/angullery/')
		.controller('angulleryAdminController', function() {
			var me        = this;
			me.newGallery = newGallery;

			function newGallery() {
				console.log('Trying to create...');
			}

		})
		.directive('angulleryMetabox', function() {

			return {
				restrict: 'E',
				templateUrl: PLUGINPATH + 'admin/templates/metabox_directive.html',
			};
		});

})();

