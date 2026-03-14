const mysql = require('mysql2/promise')
const pool = mysql.createPool9({
    host : 'localhost',
    user : 'root',
    password : '',
    db : 'school'
})
module.exports = pool;