const bcrypt = require( 'bcryptjs') ;
const nodemailer = require( 'nodemailer');
const sendgridTransport = require('nodemailer-sendgrip-transport');
const User = require('../models/user');
const transporter = nodemailer
 exports.getLogin=(req,res,next) => {
 let message = req.flash('error');
 if (message.length) >  0) {
    message = message[0];
 } else {
    message = null;
 }
 res.render('auth/login', {
 path: '/login',
 pageTitle:'Login',
 errorMessage: message
 });
