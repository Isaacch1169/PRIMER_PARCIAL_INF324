import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/obtenerImpuesto")
public class ImpuestoServlet extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Obtener el código catastral de la URL
        String codCat = request.getParameter("cod_cat");
        String tipoImpuesto = "";

        // Validar el código catastral
        if (codCat != null && !codCat.isEmpty()) {
            switch (codCat.charAt(0)) { // Verificamos el primer carácter
                case '1':
                    tipoImpuesto = "Alto";
                    break;
                case '2':
                    tipoImpuesto = "Medio";
                    break;
                case '3':
                    tipoImpuesto = "Bajo";
                    break;
                default:
                    tipoImpuesto = "Desconocido";
                    break;
            }
        }

        // Responder con el tipo de impuesto
        response.setContentType("text/html");
        response.getWriter().println("<h1>El tipo de impuesto es: " + tipoImpuesto + "</h1>");
    }
}