const { DataTypes } = require("sequelize");
const db = require("../utils/database.util"); // Assuming this is the path to your database configuration file

const CategoryModel = db.MySql.sequelize.define(
  "Category",
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
    created_at: {
      type: DataTypes.DATE,
      defaultValue: db.MySql.sequelize.literal("CURRENT_TIMESTAMP"), // Use CURRENT_TIMESTAMP for MySQL
      allowNull: false,
    },
    updated_at: {
      type: DataTypes.DATE,
      defaultValue: db.MySql.sequelize.literal("CURRENT_TIMESTAMP"),
      allowNull: false,
    },
  },
  {
    timestamps: false, // Disable automatic createdAt and updatedAt fields
  }
);

module.exports = CategoryModel;
