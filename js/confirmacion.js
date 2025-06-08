const formularios = document.querySelectorAll(".confirmacion");

formularios.forEach(form => {
  form.addEventListener("submit", function(e) {
    // Mostrar confirmación
    if (!confirm("¿Quieres enviar el formulario?")) {
      e.preventDefault(); // Cancelar envío si el usuario cancela
    }
  });
});