using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class Form3 : Form
    {
        private int ciUsuario;
        public Form3(int ci)
        {
            InitializeComponent();
            ciUsuario = ci;  // Guardar el ci del usuario logueado
            CargarDatosCatastro();
        }
        private void CargarDatosCatastro()
        {
            // Define la cadena de conexión
            string connectionString = @"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac";

            // Consulta SQL para obtener los datos del catastro según el ci del usuario
            string query = "SELECT id, cod_cat, distrito, zona, superficie, tipo_propiedad, fecha_registro, tipo_impuesto " +
                           "FROM catastro WHERE ci=@CiUsuario";

            using (SqlConnection con = new SqlConnection(connectionString))
            {
                SqlCommand cmd = new SqlCommand(query, con);
                cmd.Parameters.AddWithValue("@CiUsuario", ciUsuario);  // Pasar el ci del usuario autenticado

                SqlDataAdapter adapter = new SqlDataAdapter(cmd);
                DataTable dataTable = new DataTable();

                con.Open();
                adapter.Fill(dataTable);  // Llenar el DataTable con los datos obtenidos

                // Mostrar los datos en un DataGridView
                dataGridView1.DataSource = dataTable;
            }
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }
    }
}
