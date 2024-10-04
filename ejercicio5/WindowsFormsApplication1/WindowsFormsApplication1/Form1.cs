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
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            // Define la cadena de conexión
            string connectionString = @"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac";

            // Obtener los valores ingresados
            string enteredUsername = textBox1.Text;
            string enteredPassword = textBox2.Text;

            // Consulta SQL para obtener el id_rol y ci del usuario
            string query = "SELECT id_rol, ci FROM persona WHERE nombre=@Username AND contrasenia=@Password";

            using (SqlConnection con = new SqlConnection(connectionString))
            {
                SqlCommand cmd = new SqlCommand(query, con);
                cmd.Parameters.AddWithValue("@Username", enteredUsername);
                cmd.Parameters.AddWithValue("@Password", enteredPassword);

                con.Open();
                SqlDataReader reader = cmd.ExecuteReader();

                if (reader.Read())  // Si se encuentra el usuario
                {
                    int roleId = reader.GetInt32(0);  // Primer campo: id_rol
                    int ci = reader.GetInt32(1);      // Segundo campo: ci

                    if (roleId == 1)
                    {
                        // Redirigir al formulario de Dashboard si el rol es 1
                        Form2 dashboard = new Form2();
                        dashboard.Show();
                        this.Hide();  // Oculta el formulario de login
                    }
                    else if (roleId == 2)
                    {
                        // Si el rol es 2, abrir el formulario para mostrar los datos del catastro
                        Form3 catastroForm = new Form3(ci);  // Pasar el ci del usuario al formulario
                        catastroForm.Show();
                        this.Hide();  // Ocultar el formulario de login
                    }
                }
                else
                {
                    // Si no se encuentra el usuario o la contraseña es incorrecta
                    MessageBox.Show("Nombre de usuario o contraseña incorrectos", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }
        }
    }
}
