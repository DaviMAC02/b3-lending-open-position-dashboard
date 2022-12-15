<template>
    <section>
        <h3>Disclaimer</h3>
        <p>Esse site não é, sob nenhum aspecto, recomendação de qualquer tipo de investimento. As informações disponibilizadas na ferramenta não configuram relatório de análise ou qualquer tipo de recomendação, tendo sido obtidas a partir de fontes públicas. Deve ser salientado também que o Jumba não se responsabiliza por qualquer decisão tomada pelo cliente.</p>
        <p>Apesar de todo o cuidado que temos na coleta e manuseio das informações, estas não foram conferidas individualmente. As informações podem sofrer atraso em determinadas atualizações. O Jumba e seus sócios, administradores e representantes legais não garantem a sua exatidão, atualização, precisão, adequação, integridade ou veracidade, tampouco se responsabilizam pela publicação acidental de dados incorretos.</p>
        <p>Ressaltamos que você é totalmente responsável por qualquer decisão de investimento. Este material é fornecido somente para fins educacionais. Por fim, as informações dispostas neste site devem ser confirmadas antes de qualquer negociação, visto que não garantimos que a informação esteja correta.</p>
    </section>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'Disclaimer',
    data() {
        return {
            date: new Date().getFullYear(),
        }
    },
});
</script>

<style scoped>
    section{
        width: 80%;
        background-color: #111827;
        color: #fff;
        padding: 40px;
    }

    h3, p{
        margin: 0;
        padding: 0;
        background-color: #111827;
    }

    h3{
        margin-bottom: 16px;
    }

    p{
        margin-bottom: 8px;
    }
</style>