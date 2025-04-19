require 'sinatra'

def reverse_name(fname, lname)
    "#{lname} #{fname}"
end

get '/' do
    erb:name
end
post '/reverse' do
    fname=params[:fname]
    lname=params[:lname]

    @reversed_name=reverse_name(fname, lname)
    erb:reverse_name
end