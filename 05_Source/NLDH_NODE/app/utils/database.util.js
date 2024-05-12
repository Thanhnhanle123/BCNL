require('dotenv').config(); 
const { MongoClient } = require("mongodb");
const { Sequelize } = require("sequelize");


const config = require("../config");
class MongoDB {
  static connect = async () => {
    if (this.client) return this.client;
    this.client = await MongoClient.connect(config.db.uri_mongoDB);
    return this.client;
  };
}
class MySql {
  static sequelize = new Sequelize(config.db.mySql.database_name, config.db.mySql.user_name,config.db.mySql.password, config.db.mySql.config);
  static connect = async () => {
    if (this.client) return this.client;
    this.client = this.sequelize.sync();
    return this.client;
  };
}
module.exports = {MongoDB, MySql}
