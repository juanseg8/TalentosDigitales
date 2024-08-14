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

class LibrosController {
  async getAll(req, res) {
    try {
      const [result] = await pool.query("SELECT * FROM libros");
      res.json(result);
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  async getById(req, res) {
    try {
      const { id } = req.params;
      const [result] = await pool.query("SELECT * FROM libros WHERE id = ?", [
        id,
      ]);
      if (result.length === 0) {
        res.status(404).json({ message: "Libro no encontrado" });
      } else {
        res.json(result[0]);
      }
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  async add(req, res) {
    try {
      const libro = req.body;
      const [result] = await pool.query(
        "INSERT INTO libros (nombre, autor, categoria, anio_publicacion, ISBN) VALUES (?, ?, ?, ?, ?)",
        [
          libro.nombre,
          libro.autor,
          libro.categoria,
          libro.anio_publicacion,
          libro.ISBN,
        ]
      );
      res.json({ "id insertado": result.insertId });
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  async delete(req, res) {
    try {
      const { ISBN } = req.body;
      const [result] = await pool.query("DELETE FROM libros WHERE ISBN = ?", [
        ISBN,
      ]);
      if (result.affectedRows === 0) {
        res.status(404).json({ message: "Libro no encontrado" });
      } else {
        res.json({ "Registros eliminados": result.affectedRows });
      }
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }

  async update(req, res) {
    try {
      const libro = req.body;
      const [result] = await pool.query(
        "UPDATE libros SET nombre = ?, autor = ?, categoria = ?, anio_publicacion = ?, ISBN = ? WHERE id = ?",
        [
          libro.nombre,
          libro.autor,
          libro.categoria,
          libro.anio_publicacion,
          libro.ISBN,
          libro.id,
        ]
      );
      if (result.changedRows === 0) {
        res.status(404).json({ message: "Libro no encontrado" });
      } else {
        res.json({ "Registros actualizados": result.changedRows });
      }
    } catch (error) {
      res.status(500).json({ error: error.message });
    }
  }
}

export const libros = new LibrosController();
