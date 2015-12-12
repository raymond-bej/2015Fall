        angular.module('app')
        .controller('personDetails', function($http, $routeParams, alert, panel){
            var self = this;
            
            $http.get('/person/' + $routeParams.id)
            .success(function(data){
                self.rows = data;
            });
            $http.get("/keywords")
            .success(function(data){
                self.keywords = data;
            });
            
            self.create = function(){
                self.rows.push({ isEditing: true });
            }
            self.edit = function(row, index){
                row.isEditing = true;
            }
            self.save = function(row, index){
                $http.post('/person/', row)
                .success(function(data){
                    row.isEditing = false;
                    self.rows[index] = data;
                }).error(function(data){
                    alert.show(data.code);
                });
            }
            self.delete = function(row, index){
                panel.show( {
                    title: "Delete a person",
                    body: "Are you sure you want to delete " + row.name + "?",
                    confirm: function(){
                        $http.delete('/person/' + row.idtable1)
                        .success(function(data){
                            self.rows.splice(index, 1);
                            $location.path()
                        }).error(function(data){
                            alert.show(data.code);
                        });
                        
                    }
                });
            }
            
        });