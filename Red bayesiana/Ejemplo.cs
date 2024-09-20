class Program
{
    static void Main(string[] args)
    {
        RedBayesiana red = new RedBayesiana();

        bool noimprime = true;
        bool estaencendido = true;

        Console.WriteLine("Diagnóstico basado en los síntomas: no imprime y esta encendido.");
        red.Diagnostico(noimprime, estaencendido);

    }
}

public class RedBayesiana
{
    private Dictionary<string, double>
        probabilidadFallo = new Dictionary<string, double>
        {
                {"Cable USB Dañado",0.1 },
                {"Estar Apagado",0.9 }

        };

    private Dictionary<string, Dictionary<string, double>>
        probabilidadSintomaDadaUnFallo = new Dictionary<string, Dictionary<string, double>>
        {
                {"no imprime",new Dictionary<string, double> {{"Cable USB Dañado",0.8},{"Estar Apagado",0.2 } } },
                {"esta encendido",new Dictionary<string, double> { {"Cable USB Dañado",0.7},{"Estar Apagado",0.6 } } }
        };

    public double InferirprobabilidadFallo(string fallo,
        bool noimprime, bool estaencendido)
    {

        double probFallo = probabilidadFallo[fallo];

        double probNoImprime = probabilidadSintomaDadaUnFallo["no imprime"][fallo];

        double probEstaEncendido = probabilidadSintomaDadaUnFallo["esta encendido"][fallo];

        double unirProb = probFallo;

        if (noimprime)
            unirProb *= probNoImprime;
        else
            unirProb *= (1 - probNoImprime);

        if (estaencendido)
            unirProb *= probEstaEncendido;
        else
            unirProb *= (1 - probEstaEncendido);


        return unirProb;
    }

    public void Diagnostico(bool noimprime, bool estaencendido)
    {
        double usbProb = InferirprobabilidadFallo("Cable USB Dañado", noimprime, estaencendido);

        double apagadoProb = InferirprobabilidadFallo("Estar Apagado", noimprime, estaencendido);

        double totalProb = usbProb + apagadoProb;

        usbProb /= totalProb;
        apagadoProb /= totalProb;

        Console.WriteLine($"Probabilidad de Cable USB Dañado: {usbProb * 100:F2}%");

        Console.WriteLine($"Probabilidad de Estar Apagado: {apagadoProb * 100:F2}%");
    }

}