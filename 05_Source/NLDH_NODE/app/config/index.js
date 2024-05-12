require("dotenv").config();
const hiddenLog = {
  logging: false,
};

const showLog = {
  logging: (sql, timing) => {
    console.log(sql);
  },
};
const config = {
  db: {
    mySql : {
      database_name: 'cafe',
      user_name: 'root',
      password: 'root', 
      config: {
        dialect: 'mysql',
        host: 'localhost',
        port: 3306,
      },
    },
    uri_mongoDB: process.env.MONGODB_URI ||  "mongodb://127.0.0.1:27017/contactbook",
  },
  app: {
    port: process.env.PORT || 3000,
  },
};
module.exports = config;
