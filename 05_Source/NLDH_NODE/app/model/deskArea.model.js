const { DataTypes } = require("sequelize");
const db = require("../utils/database.util"); // Assuming this is the path to your database configuration file

const DeskAreaModel = db.MySql.sequelize.define(
  "DeskArea",
  {
    id: {
      type: DataTypes.INTEGER,
      primaryKey: true,
      autoIncrement: true,
    },
    name: {
      type: DataTypes.STRING,
      allowNull: false,
    },
    description: {
      type: DataTypes.STRING,
      allowNull: true,
    },
    createdAt: {
      type: DataTypes.DATE,
      defaultValue: db.MySql.sequelize.literal("CURRENT_TIMESTAMP"), // Use CURRENT_TIMESTAMP for MySQL
      allowNull: false,
    },
    updatedAt: {
      type: DataTypes.DATE,
      defaultValue: db.MySql.sequelize.literal("CURRENT_TIMESTAMP"),
      allowNull: false,
    },
  },
  {
    timestamps: false, // Disable automatic createdAt and updatedAt fields
  }
);

module.exports = DeskAreaModel;
