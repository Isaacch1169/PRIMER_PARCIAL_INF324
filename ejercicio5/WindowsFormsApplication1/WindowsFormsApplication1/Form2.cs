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
    public partial class Form2 : Form
    {
        DataSet ds = new DataSet();
        SqlDataAdapter ada;
        private void datos()
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = @"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac";
            ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from persona";
            ada.SelectCommand.CommandType = CommandType.Text;
            ada.Fill(ds, "persona");

        }

        public Form2()
        {
            InitializeComponent();
            CargarDatos();


            // Crear la columna de botones
            DataGridViewButtonColumn eliminarColumna = new DataGridViewButtonColumn();
            eliminarColumna.HeaderText = "Eliminar";
            eliminarColumna.Text = "Eliminar";
            eliminarColumna.UseColumnTextForButtonValue = true; // Este valor hace que aparezca el texto del botón
            eliminarColumna.Name = "btnEliminar";

            // Agregar la columna de botones al DataGridView
            dataGridView1.Columns.Add(eliminarColumna);

            //CATASTRO
            DataGridViewButtonColumn eliminarColumna2 = new DataGridViewButtonColumn();
            eliminarColumna2.HeaderText = "Eliminar";
            eliminarColumna2.Text = "Eliminar";
            eliminarColumna2.UseColumnTextForButtonValue = true; // Este valor hace que aparezca el texto del botón
            eliminarColumna2.Name = "btnEliminar2";

            // Agregar la columna de botones al DataGridView
            dataGridView2.Columns.Add(eliminarColumna2);

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            // Verificar si el clic fue en la columna del botón "Eliminar"
            if (e.ColumnIndex == dataGridView1.Columns["btnEliminar"].Index && e.RowIndex >= 0)
            {
                // Obtener el CI de la fila seleccionada
                string ci = dataGridView1.Rows[e.RowIndex].Cells["ci"].Value.ToString();

                // Confirmar antes de eliminar
                DialogResult result = MessageBox.Show("¿Está seguro que desea eliminar a esta persona?", "Confirmar Eliminación", MessageBoxButtons.YesNo);
                if (result == DialogResult.Yes)
                {
                    // Eliminar la persona de la base de datos
                    eliminarPersona(ci);

                    // Actualizar el DataGridView
                    ActualizarGrilla();
                }
            }
            DataRow dr = ds.Tables[0].Rows[e.RowIndex];
            textBox1.Text = dr["ci"].ToString();
            textBox2.Text = dr["nombre"].ToString();
            textBox3.Text = dr["paterno"].ToString();
            textBox4.Text = dr["materno"].ToString();
            textBox5.Text = dr["contrasenia"].ToString();
            textBox6.Text = dr["id_rol"].ToString();

        }

        private void eliminarPersona(string ci)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = @"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac";

            try
            {
                SqlCommand cmd = new SqlCommand();
                cmd.Connection = con;
                cmd.CommandText = "DELETE FROM persona WHERE ci = @ci";
                cmd.CommandType = CommandType.Text;
                cmd.Parameters.AddWithValue("@ci", ci);

                con.Open();
                cmd.ExecuteNonQuery();
                con.Close();

                MessageBox.Show("Persona eliminada correctamente.");
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error al eliminar la persona: " + ex.Message);
            }
            ActualizarGrilla();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            // Recoger los valores de los TextBox
            string ci = textBox1.Text;
            string nombre = textBox2.Text;
            string paterno = textBox3.Text;
            string materno = textBox4.Text;
            string contrasenia = textBox5.Text;
            string rol = textBox6.Text;

            // Crear la conexión a la base de datos
            SqlConnection con = new SqlConnection();
            con.ConnectionString = @"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac";

            try
            {
                // Comando SQL con parámetros para evitar inyecciones y problemas de sintaxis
                SqlCommand cmd = new SqlCommand();
                cmd.Connection = con;
                cmd.CommandText = "INSERT INTO persona (ci, nombre, paterno, materno, contrasenia, id_rol) " +
                                  "VALUES (@ci, @nombre, @paterno, @materno, @contrasenia, @id_rol)";
                cmd.CommandType = CommandType.Text;

                // Agregar los parámetros con los valores de los TextBox
                cmd.Parameters.AddWithValue("@ci", ci);
                cmd.Parameters.AddWithValue("@nombre", nombre);
                cmd.Parameters.AddWithValue("@paterno", paterno);
                cmd.Parameters.AddWithValue("@materno", materno);
                cmd.Parameters.AddWithValue("@contrasenia", contrasenia);
                cmd.Parameters.AddWithValue("@id_rol", rol);

                // Abrir la conexión, ejecutar la consulta y cerrarla
                con.Open();
                cmd.ExecuteNonQuery();
                con.Close();

                // Refrescar los datos en el DataGridView
                ActualizarGrilla();

                // Mostrar un mensaje de éxito
                MessageBox.Show("Datos insertados correctamente.");
            }
            catch (Exception ex)
            {
                // Manejo de errores
                MessageBox.Show("Error al insertar los datos: " + ex.Message);
            }

        }
        private void LimpiarGrilla()
        {
            dataGridView1.DataSource = null;
            dataGridView1.Rows.Clear();
            dataGridView1.Refresh();
        }
        private void CargarDatos()
        {
            try
            {
                // Configuración de la conexión
                using (SqlConnection con = new SqlConnection(@"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac"))
                {
                    // Abre la conexión a la base de datos
                    con.Open();

                    // Prepara el adaptador de datos y la consulta SQL
                    ada = new SqlDataAdapter("SELECT * FROM persona", con);

                    // Limpia el DataSet antes de llenarlo nuevamente
                    ds.Clear();

                    // Llena el DataSet con los datos de la tabla "persona"
                    ada.Fill(ds, "persona");

                    // Asigna el DataSet al DataGridView
                    dataGridView1.DataSource = ds;
                    dataGridView1.DataMember = "persona";
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error al cargar los datos: " + ex.Message);
            }
        }
        private void ActualizarGrilla()
        {
            LimpiarGrilla();
            CargarDatos();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = @"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac";

            SqlCommand cmd = new SqlCommand();
            cmd.Connection = con;
            cmd.CommandText = "UPDATE persona SET " +
                              "nombre = @nombre, " +
                              "paterno = @paterno, " +
                              "materno = @materno, " +
                              "contrasenia = @contrasenia, " +
                              "id_rol = @id_rol " +
                              "WHERE ci = @ci";

            // Agrega los parámetros
            cmd.Parameters.AddWithValue("@nombre", textBox2.Text);
            cmd.Parameters.AddWithValue("@paterno", textBox3.Text);
            cmd.Parameters.AddWithValue("@materno", textBox4.Text);
            cmd.Parameters.AddWithValue("@contrasenia", textBox5.Text);
            cmd.Parameters.AddWithValue("@id_rol", textBox6.Text);
            cmd.Parameters.AddWithValue("@ci", textBox1.Text);

            // Ejecuta el comando
            try
            {
                con.Open();
                cmd.ExecuteNonQuery();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
            finally
            {
                con.Close();
            }

            // Refresca la DataGridView después de la actualización
            ActualizarGrilla();
        }

        //CATASTRO
        private void LimpiarGrilla2()
        {
            dataGridView2.DataSource = null;
            dataGridView2.Rows.Clear();
            dataGridView2.Refresh();
        }
        private void CargarDatos2()
        {
            try
            {
                // Configuración de la conexión
                using (SqlConnection con = new SqlConnection(@"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac"))
                {
                    // Abre la conexión a la base de datos
                    con.Open();

                    // Prepara el adaptador de datos y la consulta SQL
                    ada = new SqlDataAdapter("SELECT * FROM catastro", con);

                    // Limpia el DataSet antes de llenarlo nuevamente
                    ds.Clear();

                    // Llena el DataSet con los datos de la tabla "persona"
                    ada.Fill(ds, "catastro");

                    // Asigna el DataSet al DataGridView
                    dataGridView2.DataSource = ds;
                    dataGridView2.DataMember = "catastro";
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error al cargar los datos: " + ex.Message);
            }
        }
        private void ActualizarGrilla2()
        {
            LimpiarGrilla2();
            CargarDatos2();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            // Recoger los valores de los TextBox
            string id = textBox7.Text;
            string cod_cat = textBox8.Text;
            string distrito = textBox9.Text;
            string zona = textBox10.Text;
            string superficie = textBox11.Text;
            string tipo_propiedad = textBox12.Text;
            string fecha_registro = textBox13.Text;
            string tipo_impuesto = textBox14.Text;
            string ciC = textBox15.Text;

            // Crear la conexión a la base de datos
            SqlConnection con = new SqlConnection();
            con.ConnectionString = @"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac";

            try
            {
                // Comando SQL con parámetros para evitar inyecciones y problemas de sintaxis
                SqlCommand cmd = new SqlCommand();
                cmd.Connection = con;
                cmd.CommandText = "INSERT INTO catastro (id, cod_cat, distrito, zona, superficie, tipo_propiedad, fecha_registro, tipo_impuesto, ci) " +
                                  "VALUES (@id, @cod_cat, @distrito, @zona, @superficie, @tipo_propiedad, @fecha_registro, @tipo_impuesto, @ciC)";
                cmd.CommandType = CommandType.Text;

                // Agregar los parámetros con los valores de los TextBox
                cmd.Parameters.AddWithValue("@id", id);
                cmd.Parameters.AddWithValue("@cod_cat", cod_cat);
                cmd.Parameters.AddWithValue("@distrito", distrito);
                cmd.Parameters.AddWithValue("@zona", zona);
                cmd.Parameters.AddWithValue("@superficie", superficie);
                cmd.Parameters.AddWithValue("@tipo_propiedad", tipo_propiedad);
                cmd.Parameters.AddWithValue("@fecha_registro", fecha_registro);
                cmd.Parameters.AddWithValue("@tipo_impuesto", tipo_impuesto);
                cmd.Parameters.AddWithValue("@ciC", ciC);

                // Abrir la conexión, ejecutar la consulta y cerrarla
                con.Open();
                cmd.ExecuteNonQuery();
                con.Close();

                // Refrescar los datos en el DataGridView
                ActualizarGrilla2();

                // Mostrar un mensaje de éxito
                MessageBox.Show("Datos insertados correctamente.");
            }
            catch (Exception ex)
            {
                // Manejo de errores
                MessageBox.Show("Error al insertar los datos: " + ex.Message);
            }
        }

        private void dataGridView2_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

            if (e.ColumnIndex == dataGridView2.Columns["btnEliminar2"].Index && e.RowIndex >= 0)
            {

                string id = dataGridView2.Rows[e.RowIndex].Cells["id"].Value.ToString();

                // Confirmar antes de eliminar
                DialogResult result = MessageBox.Show("¿Está seguro que desea eliminar a este Catastro?", "Confirmar Eliminación", MessageBoxButtons.YesNo);
                if (result == DialogResult.Yes)
                {
                    // Eliminar la persona de la base de datos
                    eliminarCatastro(id);

                    // Actualizar el DataGridView
                    ActualizarGrilla2();
                }
            }
            DataRow dr = ds.Tables[1].Rows[e.RowIndex];
            textBox7.Text = dr["id"].ToString();
            textBox8.Text = dr["cod_cat"].ToString();
            textBox9.Text = dr["distrito"].ToString();
            textBox10.Text = dr["zona"].ToString();
            textBox11.Text = dr["superficie"].ToString();
            textBox12.Text = dr["tipo_propiedad"].ToString();
            textBox13.Text = dr["fecha_registro"].ToString();
            textBox14.Text = dr["tipo_impuesto"].ToString();
            textBox15.Text = dr["ci"].ToString();
        }
        private void eliminarCatastro(string id)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = @"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac";

            try
            {
                SqlCommand cmd = new SqlCommand();
                cmd.Connection = con;
                cmd.CommandText = "DELETE FROM catastro WHERE id = @id";
                cmd.CommandType = CommandType.Text;
                cmd.Parameters.AddWithValue("@id", id);

                con.Open();
                cmd.ExecuteNonQuery();
                con.Close();

                MessageBox.Show("catastro eliminado correctamente.");
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error al eliminar la catastro: " + ex.Message);
            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
            CargarDatos2();
        }

        private void button6_Click(object sender, EventArgs e)
        {
            CargarDatos();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = @"server=ISAAC\SQL;user=isaac;pwd=123456;database=BDIsaac";

            SqlCommand cmd = new SqlCommand();
            cmd.Connection = con;
            cmd.CommandText = "UPDATE catastro SET " +
                              "cod_cat = @cod_cat, " +
                              "distrito = @distrito, " +
                              "zona = @zona, " +
                              "superficie = @superficie, " +
                              "tipo_propiedad = @tipo_propiedad, " +
                              "fecha_registro = @fecha_registro, " +
                              "tipo_impuesto = @tipo_impuesto " +
                              "WHERE ci = @ci and id = @id" ;

            // Agrega los parámetros
            cmd.Parameters.AddWithValue("@cod_cat", textBox8.Text);
            cmd.Parameters.AddWithValue("@distrito", textBox9.Text);
            cmd.Parameters.AddWithValue("@zona", textBox10.Text);
            cmd.Parameters.AddWithValue("@superficie", textBox11.Text);
            cmd.Parameters.AddWithValue("@tipo_propiedad", textBox12.Text);
            cmd.Parameters.AddWithValue("@fecha_registro", textBox13.Text);
            cmd.Parameters.AddWithValue("@tipo_impuesto", textBox14.Text);
            cmd.Parameters.AddWithValue("@id", textBox7.Text);
            cmd.Parameters.AddWithValue("@ci", textBox15.Text);

            // Ejecuta el comando
            try
            {
                con.Open();
                cmd.ExecuteNonQuery();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
            finally
            {
                con.Close();
            }

            // Refresca la DataGridView después de la actualización
            ActualizarGrilla2();
        }






    }
}
