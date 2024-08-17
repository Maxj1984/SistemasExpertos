namespace Encadenamiento
{
    public class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Ingrese dos hechos:");
            string var1 = Console.ReadLine();
            string var2 = Console.ReadLine();
            var hechos = new HashSet<string> { var1, var2 };
            //Console.WriteLine(var1);
            //          hechos.Add(var1);

            var reglas = new List<Regla>
            {
                new Regla(
                    new HashSet<string> {"no imprime"},
                    "esta apagado"
                    ),
                 new Regla(
                    new HashSet<string> {"no imprime","esta encendido"},
                    "revise conexion usb"
                    ),
                  new Regla(
                    new HashSet<string> {"tiene conexion usb","tiene controlador"},
                    "revise nivel de tinta"
                    ),
                    new Regla(
                    new HashSet<string> {"esta encendido","tiene conexion usb"},
                    "cambie cable USB"
                    ),
                    new Regla(
                    new HashSet<string> {"no imprime","tiene controlador"},
                    "revise cabezal de tinta"
                    ),
            };

            var conclusiones = EncadenamientoHaciaAdelante(hechos, reglas);

            Console.WriteLine("Posible diagnostico");
            foreach (var conclusion in conclusiones)
            {
                Console.WriteLine(conclusion);
            }


        }

        static HashSet<string> EncadenamientoHaciaAdelante(HashSet<string> hechos, List<Regla> reglas)
        {
            var conclusiones = new HashSet<string>();

            bool nuevoHechoAgregado;

            do
            {
                nuevoHechoAgregado = false;

                foreach (var regla in reglas)
                {
                    if (regla.Condiciones.IsSubsetOf(hechos) &&
                        !hechos.Contains(regla.Conclusion))
                    {

                        hechos.Add(regla.Conclusion);
                        conclusiones.Add(regla.Conclusion);
                        nuevoHechoAgregado = true;
                    }
                }

            } while (nuevoHechoAgregado);

            return conclusiones;
        }

    }



    class Regla
    {
        public HashSet<string> Condiciones { get; set; }

        public string Conclusion { get; }

        public Regla(HashSet<string> condiciones, string conclusion)
        {
            Condiciones = condiciones;
            Conclusion = conclusion;
        }

    }
}