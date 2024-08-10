namespace RedSemanticaEjemploClase
{
    public class Program
    {
        static void Main(string[] args)
        {
            RedSemantica red = new RedSemantica();

            Nodo perro = red.CrearNodo("Perro");
            Nodo animal = red.CrearNodo("Animal");
            Nodo tiene = red.CrearNodo("Tiene");
            Nodo cuatroPatas = red.CrearNodo("Cuatro Patas");

            Nodo tigre = red.CrearNodo("Tigre");
            Nodo ballena = red.CrearNodo("Ballena");
            Nodo albatros = red.CrearNodo("Albatros");
            Nodo avestruz = red.CrearNodo("Avestruz");

            Nodo tipo1 = red.CrearNodo("Ave");
            Nodo tipo2 = red.CrearNodo("Mamifero");

            Nodo espec1 = red.CrearNodo("Marino");
            Nodo espec2 = red.CrearNodo("Terrestre");
            Nodo espec3 = red.CrearNodo("Aereo");

            Nodo tiene1 = red.CrearNodo("Pelos");
            Nodo tiene2 = red.CrearNodo("Plumas");
            Nodo tiene3 = red.CrearNodo("Escamas");

            Nodo puede1 = red.CrearNodo("Volar");
            Nodo puede2 = red.CrearNodo("Nadar");
            Nodo puede3 = red.CrearNodo("Caminar");

            ballena.AgregarArco(animal, "es un");
            ballena.AgregarArco(tipo2, "de tipo");
            ballena.AgregarArco(tiene3, "tiene");
            ballena.AgregarArco(puede2, "puede");

            red.MostrarRed();

        }
    }

    public class Nodo
    {
        public string Etiqueta { get; set; }
        public List<Arco> Arcos { get; set; }

        public Nodo(string etiqueta)
        {
            Etiqueta = etiqueta;
            Arcos = new List<Arco>();
        }

        public void AgregarArco(Nodo destino, string etiquetaArco)
        {
            Arcos.Add(new Arco(this, destino, etiquetaArco));
        }
    }


    public class Arco
    {
        public Nodo Origen { get; set; }
        public Nodo Destino { get; set; }
        public string Etiqueta { get; set; }

        public Arco(Nodo origen, Nodo destino, string etiqueta)
        {
            Origen = origen;
            Destino = destino;
            Etiqueta = etiqueta;
        }

        public override string ToString()
        {
            return $"{Origen.Etiqueta} -- {Etiqueta} --> {Destino.Etiqueta}";
        }
    }


    public class RedSemantica
    {
        public List<Nodo> Nodos { get; set; }

        public RedSemantica()
        {
            Nodos = new List<Nodo>();
        }

        public Nodo CrearNodo(string etiqueta)
        {
            var nodo = new Nodo(etiqueta);
            Nodos.Add(nodo);
            return nodo;
        }

        public void MostrarRed()
        {
            foreach (Nodo nodo in Nodos)
            {
                foreach (var arco in nodo.Arcos)
                {
                    Console.WriteLine(arco);
                }
            }
        }
    }
}