var mysql = require("mysql");

module.exports =  {
    GetConnection: function(){
        var conn = mysql.createConnection({
          host: "localhost",
          user: "",
          password: "",
          database: "c9"
        });
    return conn;
}
};