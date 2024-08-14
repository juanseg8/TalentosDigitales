import { Router } from "express";
import { personas, libros } from "./controller.js";

export const router = Router();

// Personas
router.get("/personas", personas.getAll);
router.get("/persona/:id", personas.getById);
router.post("/persona", personas.add);
router.delete("/persona", personas.delete);
router.put("/persona", personas.update);
// Libros
router.get("/libros", libros.getAll);
router.get("/libro/:id", libros.getById);
router.post("/libro", libros.add);
router.delete("/libro", libros.delete);
router.put("/libro", libros.update);
