import pandas as pd
import matplotlib.pyplot as plt 
import plotly.express as px 
import numpy as np 
import openpyxl as op 
import streamlit as st
import streamlit.components.v1 as components

from io import BytesIO
from streamlit_option_menu import option_menu
from streamlit_extras.switch_page_button import switch_page
from openpyxl import load_workbook
from streamlit import components


st.set_page_config(page_title='Painel de Dados Abertos da CPDrogas', page_icon=':syringe:', layout='wide')


# header

with st.sidebar:
    selected = option_menu("CPDrogas: Painel de Dados Abertos", ["Home", 'Configurações', 'Calendário', 'Outros filtros de pesquisa'], 
        icons=['house', 'gear', 'calendar', 'folder'], menu_icon="cast", orientation='vertical', styles={
        "nav-link": {
                    "text-align": "left",
                    "--hover-color": "#eee",
                    "background-color": "#fbb91c",
                    "font-family": "Montserrat, sans-serif"
        }
        }
        ) 
# Adiciona o Bootstrap via CDN no cabeçalho HTML
st.markdown(
    """
    <head>
        <!-- Adiciona o link para o Bootstrap CSS via CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyFkDfFeVtR5uZl/60y20I72ODd0tzI" crossorigin="anonymous">
    </head>
    """,
    unsafe_allow_html=True
)


st.markdown(
    """
    <style>
    .header {
        background-color: #fbb91c;
        color: white;
        text-align: center;
        padding: 20px;
        border-radius: 5px;
        letter-spacing: 4px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
    """,
    unsafe_allow_html=True
)
# Adiciona um cabeçalho com a classe CSS 'header'
st.markdown('<h1 class="header">Painel de Dados Abertos da CPDrogas</h1>', unsafe_allow_html=True)

st.markdown("""
    <style>
        .div {
            margin-top: 10px;
        }
    </style>
""", unsafe_allow_html=True)

with st.container():
    col1, col2 = st.columns(2)
    col1.metric("Total de pessoas atendidas pela CPDrogas", "12.344 pessoas")
    col2.metric("Total de atendimentos de todos os setores CPDrogas", "1748")


# Obter o valor específico que você deseja mostrar
valor_especifico = "ValorDesejado"

# Filtrar a tabela com base no valor específico
# df_filtrado = df[df["NomeDaColuna"] == valor_especifico]

# Exibir a tabela filtrada no Streamlit
# st.table(df_filtrado)

# animação pra colocar em algum lugar
# from streamlit_extras.let_it_rain import rain
# rain(
#     page_icon=":syringe:",
#     font_size=40,  # the size of emoji
#     falling_speed=3,  # speed of raining
#     animation_length="infinite",  # for how much time the animation will happen
# )

# df = pd.read_xlsx('teleatendimento--painel.xlsx')


# #xlsx 
# def to_excel(df: pd.DataFrame):
#     in_memory_fp = BytesIO()
#     df.to_excel(in_memory_fp)
#     # Write the file out to disk to demonstrate that it worked.
#     in_memory_fp.seek(0, 0)
#     return in_memory_fp.read()

# cols = ["col1", "col2"]
# df = pd.DataFrame.from_records([{k: 0.0 for k in cols} for _ in range(25)])
# excel_data = to_excel(df)
# file_name = "teleatendimento--painel.xlsx"
# st.download_button(
#     f"Click to download {file_name}",
#     excel_data,
#     file_name,
#     f"text/{file_name}",
#     key=file_name
# )
# st.dataframe(df)  # Same as st.write(df)

st.sidebar.title("Pesquise aqui:") 

# multi select box
# first argument takes the box title
# second argument takes the options to show


# Defina a cor desejada para o seletor

datascpd = ['Instrumental CPDrogas', 'Comunidade Terapêutica'] 
selected_datascpd = st.radio('Escolha a origem do dado:', datascpd)

if selected_datascpd == 'Instrumental CPDrogas':
    st.write("Você selecionou Instrumental CPDrogas. O Instrumental CPDrogas possui dados do CAOI, COCAP, COINP e CIAM")
    
    setores = ['CAOI', 'COINP', 'COCAP', 'CIAM']
    
    setor_selecionado = st.sidebar.multiselect('Selecione o Setor:', setores)

    if len(setor_selecionado) > 0:
        for setor in setor_selecionado:
            if setor == 'CAOI':
                st.write('Você selecionou o Setor CAOI. O CAOI é a Coordenadoria de Acolhimento e Orientação Institucional, sendo responsável por acolher, encaminhar e acompanhar dentro da rede o usuário de álcool e outras drogas e seus familiares.')
                df = pd.read_excel('geral.xlsx', sheet_name='CAOI')
                st.write(df)
                with open('bar-caoi.html', 'r') as file:
                    html_code = file.read()
                    st.markdown(html_code, unsafe_allow_html=True)
            elif setor == 'COINP':
                st.write('Você selecionou o Setor COINP. O COINP é a Coordenadoria de Informação, Pesquisa e Banco de Dados, sendo responsável por mobilizar informações, realizar pesquisas e promover intercâmbio e difusão de dados.')
                df = pd.read_excel('geral.xlsx', sheet_name='COINP')
                st.write(df)
                with open('bar-coinp.html', 'r') as file:
                    html_code = file.read()
                    st.markdown(html_code, unsafe_allow_html=True)
            elif setor == 'COCAP':
                st.write('Você selecionou o Setor COCAP. O COCAP é a Coordenadoria de Capacitação, sendo responsável por sistematizar e articular as formações dos usuários, familiares, profissionais e comunidade.')
                df = pd.read_excel('geral.xlsx', sheet_name='COCAP')
                st.write(df)
                with open('bar-cocap.html', 'r') as file:
                    html_code = file.read()
                    st.markdown(html_code, unsafe_allow_html=True)
            elif setor == 'CIAM':
                st.write('Você selecionou o Setor CIAM. O CIAM é a Coordenadoria de Articulação, Avaliação e Monitoramento, sendo responsável por articular as áreas de saúde, educação e várias outras para a implantação de uma rede de atenção integral.')
                df = pd.read_excel('geral.xlsx', sheet_name='CIAM')
                st.write(df)
                with open('bar-ciam.html', 'r') as file:
                    html_code = file.read()
                    st.markdown(html_code, unsafe_allow_html=True)           
        else:
            st.write('Por favor, selecione pelo menos um setor.')

elif selected_datascpd == 'Comunidade Terapêutica':
    # Handle 'Comunidade Terapêutica' case if needed
    pass


# ler a planilha
# Ler uma tabela de planilha do Excel em um DataFrame pandas
# df = pd.read_excel("xlsx/caoi/agosto22.xlsx", sheet_name="Atividades realizadas")
# st.write(df)
# planilha = pd.read_excel('tel.xlsx', sheet_name="Novembro22")
# st.write(planilha)

# eixos = ['Cuidado', 'Reinserção Social', 'Prevenção', 'Pesquisa e Informação', 'Gestão e Controle Social']
# eixo_selecionado = st.sidebar.multiselect('Eixo: ', eixos)
# if len(eixos) > 0:
#     for eixos in eixo_selecionado: 
#         if eixos == 'Cuidado':
#             st.write('Foi selecionado o eixo Cuidado.')
#         elif eixos == 'Reinserção Social': 
#             st.write('Foi selecionado o eixo Reinserção Social.')
#         elif eixos == 'Prevenção':
#             st.write('Foi selecionado o eixo Prevenção.')
#         elif eixos == "Pesquisa e informação":
#             st.write('Foi selecionado o eixo Pesquisa e Informação')
#         elif eixos == "Gestão e Controle Social":
#             st.write('Foi selecionado o eixo Gestão e Controle Social')
#     else:
#         st.write('Por favor, selecione pelo menos um eixo.')

projetos = ['Acolhimento e Acompanhamento Psicossocial', 'Cuidando do Cuidador', 'Redesenhando Histórias', 'Varal de Redução de Danos', 'Famílias Fortes', 'Construindo Sonhos - Trilhando Habilidades', 'Livre Acesso', 'Atlética RAPS', 'Eventos do Centro Integrado de Referências Sobre Drogas', 'Pesquisa, Elaboração e socialização de conhecimento em Políticas Sobre Drogas', 'Apoio e realização de atividades de Informação sobre álcool e outras drogas']
projeto_selecionado = st.sidebar.multiselect('Projeto: ', projetos)

st.markdown(
    """
    <style>
    .stButton>button {
        background-color: #fbb91c;
        color: #fff;
        border-radius: 5px;
        letter-spacing: 4px;
        display: flex;
        justify-content: center;
        align-items: center;
        .no-hover:hover {
            background-color: #eee; 
            color: #fff; 
            box-shadow: none; 
    }
    </style>
    """,
    unsafe_allow_html=True
)
st.sidebar.button('pesquisar')


# st.markdown("# Main page 🎈")
# st.sidebar.markdown("# Main page 🎈")
# import streamlit as st
# st.markdown("# Page 2 ❄️")
# st.sidebar.markdown("# Page 2 ❄️")
# import streamlit as st
# st.markdown("# Page 3 🎉")
# st.sidebar.markdown("# Page 3 🎉")