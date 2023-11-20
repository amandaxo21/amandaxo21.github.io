const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');

const app = express();
const PORT = 3000;

app.use(bodyParser.urlencoded({ extended: true }));

app.post('/enviar-mensaje', (req, res) => {
  const mensaje = req.body.mensaje;

  // Configuración del transporte para enviar el correo
  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'ac2583414@gmail.com', // Coloca tu correo electrónico
      pass: 'Leonardo19'       // Coloca tu contraseña
    }
  });

  const mailOptions = {
    from: 'ac2583414@gmail.com',
    to: 'ac2583414@gmail.com', // Correo del administrador
    subject: 'Nuevo mensaje del formulario',
    text: mensaje
  };

  // Enviar el correo
  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      console.error('Error al enviar el correo:', error);
      res.send('Error al enviar el mensaje.');
    } else {
      console.log('Correo enviado:', info.response);
      res.send('Mensaje enviado con éxito.');
    }
  });
});

app.listen(PORT, () => {
  console.log(`Servidor corriendo en el puerto ${PORT}`);
});
