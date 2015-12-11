var global = require("../inc/global.js")

module.exports =  {
    blank: function(){ return {} },
    get: function(id, ret){
        var conn = global.GetConnection();
        var sql = 'SELECT P.* FROM Persons P ';
        if(id){
          sql += " WHERE P.id = " + id;
        }
        conn.query(sql, function(err,rows){
          ret(err,rows);
          conn.end();
        });        
    },
    delete: function(id, ret){
        var conn = global.GetConnection();
        conn.query("DELETE FROM Persons WHERE id = " + id, function(err,rows){
          ret(err);
          conn.end();
        });        
    },
    save: function(row, ret){
        var sql;
        var conn = global.GetConnection();
        //  TODO Sanitize
        if (row.id) {
				  sql = " Update Persons Set name=?, age=?, foodGoal=?, excerciseGoal=?, "
						  + " WHERE id = ? ";
			  }else{
				  sql = "INSERT INTO 2015Fall_Persons "
						  + " (name, age, foodGoal, excerciseGoal, created_at) "
						  + "VALUES (?, ?, ?, ?, Now() ) ";				
			  }

        conn.query(sql, [row.Name, row.Birthday, row.TypeId, row.id],function(err,data){
          if(!err && !row.id){
            row.id = data.insertId;
          }
          ret(err, row);
          conn.end();
        });        
    },
    validate: function(row){
      var errors = {};
      
      if(!row.Name) errors.Name = "is required"; 
      
      return errors.length ? errors : false;
    }
};  