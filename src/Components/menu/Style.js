import styled from 'styled-components';

export const HeaderContainer = styled.header`

  width: 100%;
  background: transparent;
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
`
export const Nav = styled.div `

  width: 100%;
  max-width: 1200px;
  display: flex;
  flex-wrap: nowrap;
  justify-content: space-between; 
  align-items: center;

  img{
    margin: 0.5rem 1rem;
    width: 4.5rem;
    height: 4.5rem;
  }

  @media (max-width: 760px) {
      display: block;
      justify-content: end;
      align-items: start;
  
  }
`;
export const ToggleButton = styled.button `

      display: none;

      border: none;
      background: transparent;

      width: 4rem;
      height: 3rem;

      z-index: 10;

      margin-left: 55vw;

      svg {
        width: 2.3rem;
        height 1.8rem;
      }

      @media only screen and (max-width: 760px) {

        display: flex;
        
      }
`;
export const IconDiv = styled.div ` 
    transition: 0.5s;

    display: flex;
    justify-content: space-between;
    align-items: center;
    min-width: 300px;

    &.openDivicon {
      width: 100%;
      transition: 0.5s;
      background: rgba(17, 13, 13, 0.9);
    }
  
`
export const Collapse = styled.div`
    transition: 0.5s;

    display: flex;
    justify-content: space-between;
    align-items: center !important;
    align-content: center;

    ul{  
      width: 100%;
      height: 100%;
      display: flex;
      flex-wrap: nowrap;
      justify-content: center;
      align-self: center;
      align-items:center;
    }

    ul li{

      margin: 10px 15px;

      white-space: nowrap;
      

      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    svg {
      margin: auto 10px;
    }
    a{
      
      white-space: nowrap;
      font-weight: 600;
      color: white;

      display: flex;
    }
    
    &.open {

      background: rgba(17, 13, 13, 0.9);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: 12%;
      transition: 0.5s;
    }

    @media (max-width: 760px) {

      width: 89vw;
      height: 100vh;
      display: block !important;
      justify-content: center;
      align-items: center;
      margin-left: 100%;
      position: absolute;
      
      ul {
        margin-top: 20%;  
        width: 100%;
        height: 80%;
        display: block;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
      }

      li{
        align-items: space-around;
        margin: 0 35px 10px 0 !important;
        padding: 15px 20px;
        background: #EDD854;
      }
    }
`
export const LoginButton = styled.button` 
    
    color: white;
    background: #202120;
    font-weight: 850;

    border-style: none;
    border-radius: 0.6rem;
  
    padding: 5px 2.5rem;

    cursor: pointer;
    outline: none;
   
   @media (max-width: 760px) {
    width: inherit;
    max-width: 90%;
    background: #EDD854;
    color: black;
   }
`
export const ShowUser = styled.div` 
    
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: -15px 2rem 0 2rem;

    img{
      margin-bottom: 10px;
      width: 3rem;
      height: 2.5rem;
    }

    span{
      font-weight: 600;
    }

`