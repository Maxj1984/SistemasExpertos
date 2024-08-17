namespace LogicaPredicados
{
    public class Program
    {
        static void Main(string[] args)
        {
            Sintoma gripe = new Sintoma("Gripe");
            Sintoma tos = new Sintoma("Tos");
            Sintoma nausea = new Sintoma("Nauseas");
            Sintoma dolor = new Sintoma("Dolores");

            RelacionSintoma relaciones = new RelacionSintoma();

            relaciones.AgregarMalestar(gripe, tos);
            relaciones.AgregarMalestar(tos, dolor);

            Console.WriteLine($"Gripe y Tos son sintomas de resfriado? {relaciones.SonEnfermedad(gripe, tos)}");
            Console.WriteLine($"Tos y Dolor son sintomas de resfriado? {relaciones.SonEnfermedad(tos, dolor)}");
            Console.WriteLine($"Gripe y Nauseas son sintomas de resfriado? {relaciones.SonEnfermedad(gripe, nausea)}");

        }
    }

    class Sintoma
    {
        public string Nombre { get; }

        public Sintoma(string nombre)
        {
            Nombre = nombre;
        }
    }

    class RelacionSintoma
    {
        private List<Tuple<Sintoma, Sintoma>> relacionesSintoma;

        public RelacionSintoma()
        {
            relacionesSintoma = new List<Tuple<Sintoma, Sintoma>>();
        }

        public void AgregarMalestar(Sintoma p1, Sintoma p2)
        {
            relacionesSintoma.Add(new Tuple<Sintoma, Sintoma>(p1, p2));
        }

        public bool SonEnfermedad(Sintoma p1, Sintoma p2)
        {
            return relacionesSintoma.Contains(new Tuple<Sintoma, Sintoma>(p1, p2)) ||
                relacionesSintoma.Contains(new Tuple<Sintoma, Sintoma>(p2, p1));
        }

    }

}