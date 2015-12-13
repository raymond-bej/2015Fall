var g = require("../inc/global");
var userId = 4;

module.exports =  {
    blank: function(){ return {} },
    get: function(id, ret){
        var conn = g.GetConnection();
        var sql = 'SELECT * FROM Meals ';
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
        conn.query("DELETE FROM Meals WHERE id = " + id, function(err,rows){
          ret(err);
          conn.end();
        });        
    },
    save: function(row, ret){
        var sql;
        var conn = g.GetConnection();
        //  TODO Sanitize
        if (row.id) {
				  sql = " UPDATE Meals "
							+ " SET mealName=?, calories=?, mealTime=?, Persons_idtable1=? "
						  + " WHERE id = ? ";
			  }else{
				  sql = "INSERT INTO Meals (createdAt, mealName, calories, mealTime, Persons_idtable1) "
						  + "VALUES (NOW(), ?, ?, ?, ?) ";				
			  }

        conn.query(sql, [row.mealName, row.calories, row.mealTime, row.Persons_idtable1, row.id],function(err,data){
          if(!err && !row.id){
            row.id = data.insertId;
          }
          ret(err, row);
          conn.end();
        });        
    },
    validate: function(row){
      var errors = {};
      
      if(!row.mealName) errors.mealName = "is required"; 
      
      return errors.length ? errors : false;
    }
};