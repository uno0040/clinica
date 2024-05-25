import firebase_admin
import google.cloud
from firebase_admin import credentials, firestore

cred = credentials.Certificate("projeto-aluno-teste-firebase-adminsdk-b6m4x-e1760a1d07.json")
firebase_admin.initialize_app(cred)

store = firestore.client()
doc_ref = store.collection(u'cursos')
materias_ref1 = store.collection(u'cursos').document('0vnFviaCC3goujzs3U9u')
materias_ref2 = materias_ref1.collection(u'materias')

while True:
    print('Deseja mostrar dados completos no formato json? s/n')
    sn = input()
    if sn != 's' and sn != 'n':
        print('Insira s ou n.')
    else:
        break

try:
    docs = doc_ref.get()
    doc1 = materias_ref2.get()
    for doc in docs:
        print(u'Titulo do curso:', doc.get('titulo'))
        if sn == 's':
            print(u'Dados do curso:{}'.format(doc.to_dict()))
    for doc in doc1:
        print('----------------------------------')
        print(u'Nome da materia:',doc.get('titulo'))
        if sn == 's':
            print(u'Dados da materia:{}'.format(doc.to_dict()))

        alunos_ref1 = materias_ref2.document(doc.id).collection(u'alunos')
        doc_aluno = alunos_ref1.get()

        prof_ref = materias_ref2.document(doc.id).collection(u'professores')
        doc_prof = prof_ref.get()
        print('-----------------')
        print('Professores:')
        for doc2 in doc_prof:
            print(u'Nome do professor:',doc2.get('nome'))
            print(u'Formacão:',doc2.get('formacao'))
            print(u'Tempo de casa:',doc2.get('tempopuc'))
            if sn == 's':
                print(u'Dados do professor:{}'.format(doc2.to_dict()))
        print('-----------------')
        print('Alunos:')
        for doc1 in doc_aluno:
            print(u'Nome do aluno:',doc1.get('nome'))
            print(u'RA:',doc1.get('ra'))
            if sn == 's':
                print(u'Dados do aluno:{}'.format(doc1.to_dict()))
except google.cloud.exceptions.NotFound:
    print(u'Missing data')