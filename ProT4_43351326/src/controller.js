import { pool } from "./database.js";

class PersonaController {
  async getAll(req, res) {
    try {
      const [result] = await pool.query("SELECT * FROM personas");
      res.json(result);
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  async getById(req, res) {
    try {
      const { id } = req.params;
      const [result] = await pool.query("SELECT * FROM personas WHERE id = ?", [
        id,
      ]);
      if (result.length === 0) {
        res.status(404).json({ message: "Persona no encontrada" });
      } else {
        res.json(result[0]);
      }
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  async add(req, res) {
    try {
      const persona = req.body;
      const [result] = await pool.query(
        "INSERT INTO personas(nombre, apellido, dni) VALUES (?, ?, ?)",
        [persona.nombre, persona.apellido, persona.dni]
      );
      res.json({ "id insertado": result.insertId });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  async delete(req, res) {
    try {
      const { id } = req.body;
      const [result] = await pool.query("DELETE FROM personas WHERE id = ?", [
        id,
      ]);
      if (result.affectedRows === 0) {
        res.status(404).json({ message: "Persona no encontrada" });
      } else {
        res.json({ "Registros eliminados": result.affectedRows });
      }
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  async update(req, res) {
    try {
      const persona = req.body;
      const [result] = await pool.query(
        "UPDATE personas SET nombre = ?, apellido = ?, dni = ? WHERE id = ?",
        [persona.nombre, persona.apellido, persona.dni, persona.id]
      );
      if (result.changedRows === 0) {
        res.status(404).json({ message: "Persona no encontrada" });
      } else {
        res.json({ "Registros actualizados": result.changedRows });
      }
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }
}

export const personas = new PersonaController();
