import tkinter as tk
from tkinter import messagebox

def registrar_estudiante():
    nombre = entry_nombre.get()
    apellido = entry_apellido.get()
    edad = entry_edad.get()
    clase = entry_clase.get()
    seccion = entry_seccion.get()
    estado = estado_var.get()
    materias_optativas = [materia for materia, var in materias_vars.items() if var.get()]
    comentarios = text_comentarios.get("1.0", tk.END).strip()
    nivel = nivel_var.get()

    # Mostrar los detalles del estudiante en el terminal
    print(f"Nombre: {nombre}")
    print(f"Apellido: {apellido}")
    print(f"Edad: {edad}")
    print(f"Clase: {clase}")
    print(f"Sección: {seccion}")
    print(f"Estado de Inscripción: {estado}")
    print(f"Materias Optativas: {', '.join(materias_optativas)}")
    print(f"Comentarios: {comentarios}")
    print(f"Nivel Escolar: {nivel}")

def limpiar_formulario():
    entry_nombre.delete(0, tk.END)
    entry_apellido.delete(0, tk.END)
    entry_edad.delete(0, tk.END)
    entry_clase.delete(0, tk.END)
    entry_seccion.delete(0, tk.END)
    estado_var.set("Inscrito")
    for var in materias_vars.values():
        var.set(False)
    text_comentarios.delete("1.0", tk.END)
    nivel_var.set("Primaria")

# Crear la ventana principal
root = tk.Tk()
root.title("Registro de Estudiantes - InnovadoresX")

# Frame de Datos Personales
frame_datos_personales = tk.Frame(root)
frame_datos_personales.pack(padx=10, pady=10)

tk.Label(frame_datos_personales, text="Nombre:").grid(row=0, column=0, sticky=tk.W)
entry_nombre = tk.Entry(frame_datos_personales)
entry_nombre.grid(row=0, column=1)

tk.Label(frame_datos_personales, text="Apellido:").grid(row=1, column=0, sticky=tk.W)
entry_apellido = tk.Entry(frame_datos_personales)
entry_apellido.grid(row=1, column=1)

tk.Label(frame_datos_personales, text="Edad:").grid(row=2, column=0, sticky=tk.W)
entry_edad = tk.Entry(frame_datos_personales)
entry_edad.grid(row=2, column=1)

# Frame de Detalles Académicos
frame_detalles_academicos = tk.Frame(root)
frame_detalles_academicos.pack(padx=10, pady=10)

tk.Label(frame_detalles_academicos, text="Clase:").grid(row=0, column=0, sticky=tk.W)
entry_clase = tk.Entry(frame_detalles_academicos)
entry_clase.grid(row=0, column=1)

tk.Label(frame_detalles_academicos, text="Sección:").grid(row=1, column=0, sticky=tk.W)
entry_seccion = tk.Entry(frame_detalles_academicos)
entry_seccion.grid(row=1, column=1)

# Frame de Estado de Inscripción
frame_estado_inscripcion = tk.Frame(root)
frame_estado_inscripcion.pack(padx=10, pady=10)

tk.Label(frame_estado_inscripcion, text="Estado de Inscripción:").grid(row=0, column=0, sticky=tk.W)
estado_var = tk.StringVar(value="Inscrito")
tk.Radiobutton(frame_estado_inscripcion, text="Inscrito", variable=estado_var, value="Inscrito").grid(row=0, column=1)
tk.Radiobutton(frame_estado_inscripcion, text="No Inscrito", variable=estado_var, value="No Inscrito").grid(row=0, column=2)

# Frame de Materias Optativas
frame_materias_optativas = tk.Frame(root)
frame_materias_optativas.pack(padx=10, pady=10)

tk.Label(frame_materias_optativas, text="Materias Optativas:").grid(row=0, column=0, sticky=tk.W)
materias_vars = {
    "Matemáticas Avanzadas": tk.BooleanVar(),
    "Ciencias Naturales": tk.BooleanVar(),
    "Lengua Extranjera": tk.BooleanVar(),
}
row = 1
for materia, var in materias_vars.items():
    tk.Checkbutton(frame_materias_optativas, text=materia, variable=var).grid(row=row, column=0, sticky=tk.W)
    row += 1

# Frame de Comentarios Adicionales
frame_comentarios = tk.Frame(root)
frame_comentarios.pack(padx=10, pady=10)

tk.Label(frame_comentarios, text="Comentarios:").grid(row=0, column=0, sticky=tk.W)
text_comentarios = tk.Text(frame_comentarios, height=5, width=40)
text_comentarios.grid(row=1, column=0)

# Menú desplegable para Nivel Escolar
nivel_var = tk.StringVar(value="Primaria")
frame_nivel = tk.Frame(root)
frame_nivel.pack(padx=10, pady=10)

tk.Label(frame_nivel, text="Nivel Escolar:").grid(row=0, column=0, sticky=tk.W)
niveles = ["Primaria", "Secundaria"]
nivel_menu = tk.OptionMenu(frame_nivel, nivel_var, *niveles)
nivel_menu.grid(row=0, column=1)

# Botones de Acción
frame_botonera = tk.Frame(root)
frame_botonera.pack(padx=10, pady=10)

tk.Button(frame_botonera, text="Registrar Estudiante", command=registrar_estudiante).grid(row=0, column=0, padx=5)
tk.Button(frame_botonera, text="Limpiar", command=limpiar_formulario).grid(row=0, column=1, padx=5)

root.mainloop()
