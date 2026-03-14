const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');
const path = require('path');

const app = express();

app.use(cors());
app.use(express.json());

// เปิดโฟลเดอร์รูป pic
app.use('/pic', express.static(path.join(__dirname, 'pic')));

// เปิดไฟล์ HTML
app.use(express.static(__dirname));

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'school'
});

db.connect(err => {
  if (err) {
    console.error('DB Error:', err);
  } else {
    console.log('Connected to MySQL');
  }
});

app.get('/api/student', (req, res) => {
  const sql = `
    SELECT 
      s.id,
      s.firstname,
      s.lastname,
      s.age,
      s.image_url,
      c.name AS class_name
    FROM student s
    JOIN class c ON s.class_id = c.id
  `;

  db.query(sql, (err, result) => {
    if (err) return res.status(500).json(err);
    res.json(result);
  });
});

app.listen(3000, () => {
  console.log('Server running on http://localhost:3000');
});