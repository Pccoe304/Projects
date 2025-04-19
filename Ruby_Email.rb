require 'mail'

Mail.defaults do
  delivery_method :smtp,
                  {
                    address: 'smtp.gmail.com',
                    port: 587,
                    user_name: 'bhamaremrunal2004@gmail.com',
                    password: 'qgao bsax quze cbwi',
                    authentication: :login,
                    enable_starttls_auto: true
                  }
end

message = Mail.new do
  from 'bhamaremrunal2004@gmail.com'
  to 'mrunal.bhamare23@pccoepune.org'
  subject 'Hello from Mrunal! with Ruby code!!'
  body 'This is what i created message from ruby Woah !!'
end

message.deliver!


# app password : qgao bsax quze cbwi