import mysqlConecction from "mysql2/promise";

const properties = {
  host: "localhost",
  user: "root",
  password: "",
  database: "rest-api",
};

export const pool = mysqlConecction.createPool(properties);
