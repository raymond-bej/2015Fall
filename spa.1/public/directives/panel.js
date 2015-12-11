angular.module('rbejarano.directives')
    .directive('rbPanel', function () {
        return {
            restrict: 'EA', //E = element, A = attribute, C = class, M = comment         
            controller: function(panel, $scope){
                $scope.vm = panel;
            },
            templateUrl: 'directives/panel.html'
        }
    })
    .service('panel', function(){
        var self = this;
        self.state = null;
        self.show = function(state){
            self.state = state;
        }
})