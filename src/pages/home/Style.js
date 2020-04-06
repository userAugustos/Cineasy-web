import styled from 'styled-components';
import bgimage from '../../assets/bghome.png';


//Conteudo FirstLook

export const Content = styled.div `

  width: 100%;
  background: url(${bgimage}); /*definindo background juntando js e css*/
  background-size: cover;
  background-repeat: no-repeat;

  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  align-items: center;
  overflow: hidden;

  img{
    height: 100vh;
  }
`;

export const DivDash = styled.div`

  max-width: 50%;
  display: block;
  justify-content: center;
  align-items: center;
  margin: 0 0;

  h3{
    text-align:center;
    font-size: 2.5rem;
    font-weight: bolder;
    margin-bottom: 30px;
  }
  p{
    font-weight: 500;
  }

  img{
    width: 90%;
    height: 95vh;
    max-height: 1200px;
    max-width: 500px;
  }

  @media only screen and (max-width: 800px) {
    
    min-width: 100%;
    margin: 30% 0 20px 20px;

    h3{
      font-size: 2rem;
    }

  }
`;
export const BtnContent = styled.div`
  display: flex;
  justify-content: space-around;
  align-items: center;

  button{
    display: flex;
    justify-content: space-between;
    align-items: center;

    margin: 5px 10px;
    color: white;
    background: #202120;

    border-style: none;
    border-radius: 0.4rem;


    padding-right: 1.5rem;
    padding-top: 0.3rem;
    padding-bottom: 0.3rem;

    cursor: pointer;
  }
  svg {
    padding: 0!important;
    margin: 0 10px;
  }
`;
export const Section = styled.div`
  width: 100%;
  min-height: 850px;
`;
