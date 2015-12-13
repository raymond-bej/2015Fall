var g = require("../inc/global");
var userId = 4;

module.exports =  {
    blank: function(){ return {} },
    get: function(id, ret){
        var conn = g.GetConnection();
        var sql = 'SELECT * FROM Exercises ';
        if(id){
          sql += " WHERE id = " + id;
        }
        conn.query(sql, function(err,rows){
          ret(err,rows);
          conn.end();
        });        
    },
    delete: function(id, ret){
        var conn = g.GetConnection();
        conn.query("DELETE FROM Exercises WHERE id = " + id, function(err,rows){
          ret(err);
          conn.end();
        });        
    },
    save: function(row, ret){
        var sql;
        var conn = g.GetConnection();
        //  TODO Sanitize
        if (row.id) {
				  sql = " UPDATE Exercises "
							+ " SET Persons_idtable1=?, Name=?, Duration=?, calories=? "
						  + " WHERE id = ? ";
			  }else{
				  sql = "INSERT INTO Exercises (createdAt, Persons_idtable1, Name, Duration, calories) "
						  + "VALUES (Now(), ?, ?, ?, ?) ";				
			  }

        conn.query(sql, [row.Persons_idtable1, row.Name, row.Duration, row.calories, row.id],function(err,data){
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

