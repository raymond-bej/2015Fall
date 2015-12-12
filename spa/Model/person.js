var global = require("../inc/global.js")

module.exports =  {
    blank: function(){ return {} },
    get: function(id, ret){
        var conn = global.GetConnection();
        var sql = "SELECT * FROM Persons ";
        if(id){
          sql += "WHERE idtable1 = " + id;
        }
        conn.query(sql, function(err,rows){
          ret(err,rows);
          conn.end();
        });        
    },
    delete: function(id, ret){
        var conn = global.GetConnection();
        conn.query("DELETE FROM Persons WHERE idtable1 = " + id, function(err,rows){
          ret(err);
          conn.end();
        });        
    },
    save: function(row, ret){
        var sql;
        var conn = global.GetConnection();
        //  TODO Sanitize
        if (row.idtable1) {
            sql = " UPDATE Persons SET name=?, age=?, foodGoal=?, excerciseGoal=? "
						  + " WHERE idtable1=?";
			  }else{
				  sql = "INSERT INTO Persons "
						  + " (name, age, foodGoal, excerciseGoal, createdAt) "
						  + "VALUES (?, ?, ?, ?, Now() ) ";				
			  }

        conn.query(sql, [row.name, row.age, row.foodGoal, row.excerciseGoal, row.idtable1],function(err,data){
          if(!err && !row.idtable1){
            row.idtable1 = data.insertId;
          }
          ret(err, row);
          conn.end();
        });        
    },
    validate: function(row){
      var errors = {};
      
      if(!row.name) errors.name = "is required"; 
      
      return errors.length ? errors : false;
    }
};  