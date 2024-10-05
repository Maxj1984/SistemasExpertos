# expert_system.py

from pyke import knowledge_engine

class Symptoms:
    def __init__(self):
        self.symptoms = set()
        self.diagnosis = None

    def add_symptom(self, symptom):
        self.symptoms.add(symptom)

    def has_symptom(self, symptom):
        return symptom in self.symptoms

    def set_diagnosis(self, diagnosis):
        self.diagnosis = diagnosis

def main():
    engine = knowledge_engine.KnowledgeEngine()
    symptoms = Symptoms()

    # Preguntar al usuario por los síntomas
    print("Ingrese los síntomas del paciente (escriba 'fin' para terminar):")
    while True:
        symptom = input("Síntoma: ").strip().lower()
        if symptom == 'fin':
            break
        symptoms.add_symptom(symptom)

    # Cargar las reglas
    engine.reset()  # Resetea el motor de reglas
    engine.activate('rules/symptoms')

    # Proporcionar el objeto de síntomas al motor
    engine.provide('symptoms', symptoms)

    # Ejecutar el motor de reglas
    engine.run()

    # Mostrar el diagnóstico
    if symptoms.diagnosis:
        print(f"Diagnóstico: {symptoms.diagnosis}")
    else:
        print("No se pudo determinar un diagnóstico.")

if __name__ == '__main__':
    main()
