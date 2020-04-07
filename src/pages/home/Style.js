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

  img{
    height: 100vh;
  }

  @media (max-width: 800px){
    overflow: scroll;
    max-height: 100vh;
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
    max-width: 9.5rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;

    margin: 5px 10px;
    color: white;
    background: #202120;

    border-style: none;
    border-radius: 0.4rem;


    padding-right: 0.5rem;
    padding-top: 0.3rem;
    padding-bottom: 0.3rem;

    cursor: pointer;
  }

  button span {
    width: 100%;
    color: rgba(245, 244, 244, 0.78);
    font-size: 11px;

  }

   button svg {
    padding: 0!important;
    margin: 0 10px 9px 10px;
  }

  @media (max-width: 800px){
  }
`;
export const Section = styled.div`
  
  display: block;
  justify-content: center;
  width: 100%;
`;

export const DivMovies =  styled.div ` 
  
  display: flex;
  justify-content: space-between;
  align-items: stretch;
  
  margin: 30px auto;

  width: 100vw;
  max-height: 500px;
  
   img {
    max-width: 300px;
  }

`
