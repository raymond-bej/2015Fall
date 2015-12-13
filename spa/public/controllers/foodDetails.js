        angular.module('app')
        .controller('foodDetails', function($http, $routeParams, alert, panel){
            var self = this;
            
            $http.get('/food/' + $routeParams.id)
            .success(function(data){
                self.rows = data;
            });
            $http.get("/person")
            .success(function(data){
                self.persons = data;
            });
            
            self.create = function(){
                self.rows.push({ isEditing: true });
            }
            self.edit = function(row, index){
                row.isEditing = true;
            }
            self.save = function(row, index){
                $http.post('/food/', row)
                .success(function(data){
                    row.isEditing = false;
                    self.rows[index] = data;
                }).error(function(data){
                    alert.show(data.code);
                });
            }
            self.delete = function(row, index){
                panel.show( {
                    title: "Delete a meal",
                    body: "Are you sure you want to delete " + row.mealName + "?",
                    confirm: function(){
                        $http.delete('/food/' + row.idtable1)
                        .success(function(data){
                            self.rows.splice(index, 1);
                    //        $location.path()
                        }).error(function(data){
                            alert.show(data.code);
                        });
                        
                    }
                });
            }
            
        });