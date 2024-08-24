namespace Encadenamiento
{
    public class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Ingrese para duracion de peliculas(una hora o dos horas):");
            string var1 = Console.ReadLine();
            Console.WriteLine("Ingrese para personaje de peliculas(Capitán América, Avengers,Spiderman):");
            string var2 = Console.ReadLine();
            var hechos = new HashSet<string> { var1, var2 };
            //Console.WriteLine(var1);
            //          hechos.Add(var1);

            var reglas = new List<Regla>
            {
                new Regla(
                    new HashSet<string> {""},
                    "Sin recomendaciones"
                    ),
                 new Regla(
                    new HashSet<string> {"dos horas","Avengers"},
                    "Avengers: Endgame"
                    ),
                  new Regla(
                    new HashSet<string> {"una hora","Avengers"},
                    "Avengers: Infinity War"
                    ),
                    new Regla(
                    new HashSet<string> {"dos horas","Capitán América"},
                    "Capitán América: Civil War"
                    ),
                    new Regla(
                    new HashSet<string> {"una hora","Capitán América"},
                    "Capitán América: Primer Vengador"
                    ),
                    new Regla(
                    new HashSet<string> {"dos horas","Spiderman"},
                    "Spiderman: Homecomming"
                    ),
                    new Regla(
                    new HashSet<string> {"una hora","Spiderman"},
                    "Spiderman: Lejos de Casa"
                    ),
            };

            var conclusiones = EncadenamientoHaciaAdelante(hechos, reglas);

            Console.WriteLine("Posible Recomendacion de Pelicula");
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