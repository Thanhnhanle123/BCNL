const app = require("./app");
const {MySql, MongoDB} = require("./app/utils/database.util");
const config = require("./app/config");
async function startServer() {
  await connectDB("mysql").then(() => {
    const PORT = config.app.port;
    app.listen(PORT, () => {
      console.log(`Server is running on port ${PORT}`);
    });
  });
}

const connectDB = async (databaseName) => {
  try {
    switch (databaseName.toUpperCase()) {
      case "MYSQL":
        await MySql.connect();
        return true;
      case "MONGODB":
        await MongoDB.connect();
        return true;
      default:
        return false;
    }
  } catch (error) {
    console.log("Cannot connect to the database!", error);
    process.exit();
  }
};

startServer();
